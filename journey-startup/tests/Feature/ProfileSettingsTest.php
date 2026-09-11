<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ProfileSettingsTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_owner_can_view_and_update_its_profile_and_startup_settings(): void
    {
        $user = User::factory()->create(['name' => 'Ana Silva', 'email' => 'ana@foundra.test']);
        $organization = Organization::factory()->create();
        $organization->users()->attach($user, ['role' => 'owner']);
        $startup = Startup::factory()->create(['organization_id' => $organization->id, 'name' => 'Nuvem']);

        $this->actingAs($user)->get(route('entrepreneur.settings'))
            ->assertOk()
            ->assertSee('Ana Silva')
            ->assertSee('Nuvem');

        $this->actingAs($user)->put(route('entrepreneur.settings.profile.update'), [
            'name' => 'Ana Martins',
            'email' => 'ana.martins@foundra.test',
            'job_title' => 'Fundadora',
        ])->assertRedirect(route('entrepreneur.settings'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Ana Martins',
            'email' => 'ana.martins@foundra.test',
            'job_title' => 'Fundadora',
        ]);

        $this->actingAs($user)->put(route('entrepreneur.settings.startup.update'), [
            'name' => 'Nuvem Labs',
            'sector' => 'SaaS B2B',
            'is_public' => true,
        ])->assertRedirect(route('entrepreneur.settings'));

        $this->assertDatabaseHas('startups', [
            'id' => $startup->id,
            'name' => 'Nuvem Labs',
            'sector' => 'SaaS B2B',
            'is_public' => true,
        ]);
    }
}
