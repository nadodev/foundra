<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesRenderTest extends TestCase
{
    use LazilyRefreshDatabase;

    #[DataProvider('routesProvider')]
    public function test_page_renders_successfully(string $routeName): void
    {
        $user = User::factory()->create();
        $organization = Organization::factory()->create();
        $organization->users()->attach($user, ['role' => 'owner']);
        Startup::factory()->for($organization)->create();

        $response = $this->actingAs($user)->get(route($routeName));

        $response->assertStatus(200);
    }

    #[DataProvider('guestRoutesProvider')]
    public function test_guest_page_renders_successfully(string $routeName): void
    {
        $response = $this->get(route($routeName));

        $response->assertStatus(200);
    }

    public static function routesProvider(): array
    {
        return [
            // Public
            'home' => ['home'],
            'passport.public' => ['passport.public'],
            'pages.index' => ['pages.index'],

            // Onboarding
            'onboarding' => ['onboarding'],
            'startup.create' => ['startup.create'],
            'startup.analysis' => ['startup.analysis'],

            // Entrepreneur
            'entrepreneur.overview' => ['entrepreneur.overview'],
            'entrepreneur.journey' => ['entrepreneur.journey'],
            'entrepreneur.history' => ['entrepreneur.history'],
            'entrepreneur.validation' => ['entrepreneur.validation'],
            'entrepreneur.experiments' => ['entrepreneur.experiments'],
            'entrepreneur.research' => ['entrepreneur.research'],
            'entrepreneur.evidence' => ['entrepreneur.evidence'],
            'entrepreneur.interviews' => ['entrepreneur.interviews'],
            'entrepreneur.interviews.new' => ['entrepreneur.interviews.new'],
            'entrepreneur.interviews.detail' => ['entrepreneur.interviews.detail'],
            'entrepreneur.competitors' => ['entrepreneur.competitors'],
            'entrepreneur.business-model' => ['entrepreneur.business-model'],
            'entrepreneur.mvp' => ['entrepreneur.mvp'],
            'entrepreneur.pitch' => ['entrepreneur.pitch'],
            'entrepreneur.pitch-coach' => ['entrepreneur.pitch-coach'],
            'entrepreneur.readiness' => ['entrepreneur.readiness'],
            'entrepreneur.passport' => ['entrepreneur.passport'],
            'entrepreneur.milestones' => ['entrepreneur.milestones'],
            'entrepreneur.mentors' => ['entrepreneur.mentors'],
            'entrepreneur.documents' => ['entrepreneur.documents'],
            'entrepreneur.notifications' => ['entrepreneur.notifications'],
            'entrepreneur.journey-ai' => ['entrepreneur.journey-ai'],
            'entrepreneur.settings' => ['entrepreneur.settings'],

            // Program
            'program.index' => ['program.index'],
            'program.startups' => ['program.startups'],
            'program.startup.detail' => ['program.startup.detail'],
            'program.cohort' => ['program.cohort'],
            'program.mentors' => ['program.mentors'],
            'program.reports' => ['program.reports'],
            'program.notifications' => ['program.notifications'],
            'program.settings' => ['program.settings'],

            // Mentor
            'mentor.index' => ['mentor.index'],
            'mentor.startups' => ['mentor.startups'],
            'mentor.startup.detail' => ['mentor.startup.detail'],
            'mentor.sessions' => ['mentor.sessions'],
            'mentor.feedback' => ['mentor.feedback'],
            'mentor.profile' => ['mentor.profile'],

            // Investor
            'investor.discovery' => ['investor.discovery'],
        ];
    }

    public static function guestRoutesProvider(): array
    {
        return [
            'login' => ['login'],
            'register' => ['register'],
        ];
    }
}
