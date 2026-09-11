<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateStartupFieldRequest;
use App\Services\GeminiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\RateLimiter;

class GeminiController extends Controller
{
    public function generateField(GenerateStartupFieldRequest $request, GeminiService $gemini): JsonResponse
    {
        $rateLimitKey = 'gemini-suggestion:'.$request->user()->id;

        if (RateLimiter::tooManyAttempts($rateLimitKey, 1)) {
            $retryAfter = RateLimiter::availableIn($rateLimitKey);

            return response()
                ->json(['message' => 'Você já usou sua sugestão gratuita. Aguarde para gerar novamente.', 'retry_after' => $retryAfter], 429)
                ->header('Retry-After', $retryAfter);
        }

        if (! $gemini->configured()) {
            return response()->json(['message' => 'A IA ainda não foi configurada. Adicione GEMINI_API_KEY ao arquivo .env.'], 503);
        }

        $validated = $request->validated();
        $text = $gemini->suggestField($validated['field'], $validated);

        if ($text === null) {
            if ($retryAfter = $gemini->retryAfter()) {
                return response()
                    ->json([
                        'message' => 'A cota do Gemini está temporariamente esgotada. Aguarde para tentar novamente.',
                        'retry_after' => $retryAfter,
                    ], 429)
                    ->header('Retry-After', $retryAfter);
            }

            return response()->json(['message' => 'O Gemini não respondeu a tempo ou está temporariamente indisponível. Tente novamente em alguns instantes.'], 502);
        }

        RateLimiter::hit($rateLimitKey, 300);

        return response()->json(['text' => $text, 'cooldown_seconds' => 300]);
    }
}
