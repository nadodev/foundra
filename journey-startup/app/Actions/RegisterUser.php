<?php

namespace App\Actions;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterUser
{
    /**
     * @param  array{name: string, email: string, password: string}  $attributes
     */
    public function handle(array $attributes): User
    {
        return DB::transaction(function () use ($attributes): User {
            $user = User::create($attributes);

            $organization = Organization::create([
                'name' => $user->name.' Workspace',
                'trial_ends_at' => now()->addDays(14),
            ]);

            $organization->users()->attach($user, ['role' => 'owner']);

            return $user;
        });
    }
}
