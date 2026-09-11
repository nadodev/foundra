<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GeminiFeatureTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_authenticated_user_can_generate_a_field_suggestion(): void
    {
        config()->set('services.gemini.key', 'test-key');
        Http::fake([
            'generativelanguage.googleapis.com/*' => Http::response([
                'steps' => [[
                    'type' => 'model_output',
                    'content' => [['type' => 'text', 'text' => 'Uma sugestão real para a ideia.']],
                ]],
            ]),
        ]);

        $user = User::factory()->create();
        $payload = [
            'field' => 'description',
            'instruction' => 'Foque na dor de equipes financeiras.',
            'name' => 'ResolvDados',
            'problem' => 'Equipes perdem tempo com planilhas.',
        ];

        $response = $this->actingAs($user)->postJson(route('ai.field.generate'), $payload);

        $response->assertOk()->assertJson(['text' => 'Uma sugestão real para a ideia.', 'cooldown_seconds' => 300]);

        $this->actingAs($user)->postJson(route('ai.field.generate'), $payload)
            ->assertTooManyRequests()
            ->assertJsonStructure(['retry_after']);
    }
}
