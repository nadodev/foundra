<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Startup>
 */
class StartupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'problem' => fake()->sentence(),
            'target_customer' => fake()->jobTitle(),
            'solution' => fake()->paragraph(),
        ];
    }
}
