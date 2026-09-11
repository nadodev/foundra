<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Startup;
use Illuminate\Database\Seeder;

class StartupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organization = Organization::factory()->create();

        Startup::factory()->for($organization)->create();
    }
}
