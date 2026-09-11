<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class OnboardingWizardTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_owner_can_complete_the_persistent_onboarding_wizard(): void
    {
        $user = User::factory()->create();
        $organization = Organization::factory()->create();
        $organization->users()->attach($user, ['role' => 'owner']);

        $contextResponse = $this->actingAs($user)->put(route('onboarding.update'), [
            'onboarding_stage' => 'idea',
            'onboarding_goal' => 'Validar o problema antes de construir.',
        ]);

        $contextResponse->assertRedirect(route('startup.create'));
        $this->assertDatabaseHas('organizations', [
            'id' => $organization->id,
            'onboarding_stage' => 'idea',
            'onboarding_goal' => 'Validar o problema antes de construir.',
        ]);

        $startupResponse = $this->actingAs($user)->post(route('startup.store'), [
            'name' => 'Concilia',
            'description' => 'Uma ferramenta para conciliação de vendas.',
            'problem' => 'Lojistas perdem tempo com conferência manual.',
            'target_customer' => 'Pequenos varejistas',
            'solution' => 'Automatizar a conferência e sinalizar divergências.',
        ]);

        $startupResponse->assertRedirect(route('startup.analysis'));
        $this->assertDatabaseHas('startups', [
            'organization_id' => $organization->id,
            'name' => 'Concilia',
            'target_customer' => 'Pequenos varejistas',
        ]);

        $this->actingAs($user)->get(route('startup.analysis'))
            ->assertSee('Concilia')
            ->assertSee('Pequenos varejistas');
    }

    public function test_startup_step_requires_real_startup_information(): void
    {
        $user = User::factory()->create();
        $organization = Organization::factory()->create();
        $organization->users()->attach($user, ['role' => 'owner']);

        $response = $this->actingAs($user)->post(route('startup.store'), []);

        $response->assertInvalid(['name', 'description', 'problem', 'target_customer', 'solution']);
        $this->assertDatabaseCount('startups', 0);
    }
}
