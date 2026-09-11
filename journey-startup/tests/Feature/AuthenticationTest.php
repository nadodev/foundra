<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_user_can_register_and_receive_an_owner_workspace(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Ana Silva',
            'email' => 'ana@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ]);

        $response->assertRedirect(route('role.select'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['name' => 'Ana Silva', 'email' => 'ana@example.com']);
        $this->assertDatabaseHas('organizations', ['name' => 'Ana Silva Workspace', 'type' => 'startup', 'plan' => 'starter']);
        $this->assertDatabaseHas('organization_user', ['user_id' => User::firstOrFail()->id, 'role' => 'owner']);
    }

    public function test_registration_requires_valid_data(): void
    {
        $response = $this->post(route('register'), []);

        $response->assertInvalid(['name', 'email', 'password']);
        $response->assertSessionHasErrors([
            'name' => 'Informe seu nome completo.',
            'email' => 'Informe seu e-mail.',
            'password' => 'Informe uma senha.',
        ]);
        $this->assertGuest();
    }

    public function test_user_can_sign_in_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'ana@example.com',
            'password' => Hash::make('secure-password'),
        ]);

        $response = $this->post(route('login'), [
            'email' => 'ana@example.com',
            'password' => 'secure-password',
        ]);

        $response->assertRedirect(route('entrepreneur.overview'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_sign_in_with_invalid_credentials(): void
    {
        User::factory()->create([
            'email' => 'ana@example.com',
            'password' => Hash::make('secure-password'),
        ]);

        $response = $this->from(route('login'))->post(route('login'), [
            'email' => 'ana@example.com',
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertInvalid(['email']);
        $this->assertGuest();
    }
}
