<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_owner_can_select_their_workspace_type(): void
    {
        $user = User::factory()->create();
        $organization = Organization::factory()->create(['type' => 'startup']);
        $organization->users()->attach($user, ['role' => 'owner']);

        $response = $this->actingAs($user)->put(route('role.select.update'), ['type' => 'program']);

        $response->assertRedirect(route('program.index'));
        $this->assertDatabaseHas('organizations', ['id' => $organization->id, 'type' => 'program']);
    }

    public function test_member_cannot_change_workspace_type(): void
    {
        $user = User::factory()->create();
        $organization = Organization::factory()->create(['type' => 'startup']);
        $organization->users()->attach($user, ['role' => 'member']);

        $response = $this->actingAs($user)->put(route('role.select.update'), ['type' => 'program']);

        $response->assertNotFound();
        $this->assertDatabaseHas('organizations', ['id' => $organization->id, 'type' => 'startup']);
    }
}
