<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\Startup;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    private ?int $retryAfter = null;

    public function configured(): bool
    {
        return filled(config('services.gemini.key'));
    }

    public function retryAfter(): ?int
    {
        return $this->retryAfter;
    }

    /**
     * @param  array<string, string|null>  $context
     */
    public function suggestField(string $field, array $context): ?string
    {
        $labels = [
            'description' => 'descrição da ideia',
            'problem' => 'problema',
            'target_customer' => 'público-alvo',
            'solution' => 'solução',
            'onboarding_goal' => 'objetivo atual',
        ];

        if (! isset($labels[$field])) {
            return null;
        }

        $brief = $this->brief($context);
        $instruction = $context['instruction'] ?? '';

        return $this->generate(<<<PROMPT
Você é a Foundra AI, uma facilitadora de descoberta de startups. Escreva em português do Brasil.
Ajude a redigir somente o campo "{$labels[$field]}". Use apenas o contexto fornecido; se faltar informação, proponha uma formulação cautelosa e não invente fatos.
Retorne apenas o texto pronto para colar no campo, sem título, markdown, aspas ou explicações. Seja concreto e mantenha no máximo 90 palavras.

Contexto da startup:
{$brief}

Orientação dada pelo fundador:
{$instruction}
PROMPT, 1024);
    }

    public function analyzeStartup(Startup $startup, Organization $organization): ?string
    {
        $brief = $this->brief([
            'name' => $startup->name,
            'description' => $startup->description,
            'problem' => $startup->problem,
            'target_customer' => $startup->target_customer,
            'solution' => $startup->solution,
            'onboarding_goal' => $organization->onboarding_goal,
        ]);

        return $this->generate(<<<PROMPT
Você é uma estrategista de startups da Foundra. Analise a startup abaixo para uma apresentação de descoberta inicial.
Não invente validações, métricas, entrevistas, clientes ou concorrentes. Faça inferências apenas quando identificar claramente que são hipóteses.
Escreva em português do Brasil, com tom direto, humano e útil. Use exatamente estes blocos curtos:

RESUMO DA TESE
PROBLEMA E PÚBLICO
PROPOSTA DE VALOR
RISCOS A VALIDAR
PRÓXIMO EXPERIMENTO

Em cada bloco, escreva de 1 a 3 frases. O resultado será mostrado ao fundador como uma análise pronta para apresentar e revisar.

Dados informados pelo fundador:
{$brief}
PROMPT, 2048);
    }

    private function generate(string $prompt, int $maxOutputTokens): ?string
    {
        $this->retryAfter = null;

        if (! $this->configured()) {
            return null;
        }

        try {
            $response = Http::acceptJson()
                ->connectTimeout(15)
                ->timeout(45)
                ->withHeaders(['x-goog-api-key' => config('services.gemini.key')])
                ->post('https://generativelanguage.googleapis.com/v1beta/interactions', [
                    'model' => config('services.gemini.model'),
                    'input' => $prompt,
                    'store' => false,
                    'generation_config' => [
                        'max_output_tokens' => $maxOutputTokens,
                        'thinking_level' => config('services.gemini.thinking_level'),
                    ],
                ]);

            if ($response->failed()) {
                $message = (string) data_get($response->json(), 'error.message');
                $headerRetryAfter = (int) $response->header('Retry-After', 0);

                if ($response->status() === 429 && preg_match('/retry in ([\d.]+)s/i', $message, $matches)) {
                    $this->retryAfter = max($headerRetryAfter, (int) ceil((float) $matches[1]));
                }

                Log::warning('Gemini request failed.', [
                    'status' => $response->status(),
                    'message' => $message,
                ]);

                return null;
            }

            $text = collect(data_get($response->json(), 'steps', []))
                ->filter(fn (array $step) => data_get($step, 'type') === 'model_output')
                ->flatMap(fn (array $step) => data_get($step, 'content', []))
                ->pluck('text')
                ->filter()
                ->implode("\n");

            return filled($text) ? trim($text) : null;
        } catch (\Throwable $exception) {
            Log::warning('Gemini request could not be completed.', ['exception' => $exception->getMessage()]);

            return null;
        }
    }

    /**
     * @param  array<string, string|null>  $context
     */
    private function brief(array $context): string
    {
        return collect($context)
            ->filter(fn (?string $value) => filled($value))
            ->map(fn (string $value, string $key) => ucfirst(str_replace('_', ' ', $key)).': '.trim($value))
            ->implode("\n");
    }
}
