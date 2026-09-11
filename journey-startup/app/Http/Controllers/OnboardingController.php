<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStartupRequest;
use App\Http\Requests\UpdateOnboardingContextRequest;
use App\Http\Requests\UpdateOrganizationTypeRequest;
use App\Models\Organization;
use App\Models\Startup;
use App\Models\User;
use App\Services\GeminiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OnboardingController extends Controller
{
    public function roleSelect(): View
    {
        return view('public.role-select');
    }

    public function updateOrganizationType(UpdateOrganizationTypeRequest $request): RedirectResponse
    {
        $organization = $request->user()
            ->organizations()
            ->wherePivot('role', 'owner')
            ->firstOrFail();

        $organization->update($request->validated());

        return redirect()->route(match ($organization->type) {
            'program' => 'program.index',
            'mentor' => 'mentor.index',
            default => 'onboarding',
        });
    }

    public function onboarding(): View
    {
        return view('onboarding.onboarding', [
            'organization' => $this->currentOrganization(request()->user()),
        ]);
    }

    public function storeOnboardingContext(UpdateOnboardingContextRequest $request): RedirectResponse
    {
        $this->currentOrganization($request->user())->update($request->validated());

        return redirect()->route('startup.create');
    }

    public function createStartup(): View
    {
        $organization = $this->currentOrganization(request()->user());

        return view('onboarding.create-startup', [
            'organization' => $organization,
            'startup' => $organization->startups()->latest()->first(),
        ]);
    }

    public function storeStartup(StoreStartupRequest $request, GeminiService $gemini): RedirectResponse
    {
        $organization = $this->currentOrganization($request->user());
        $startup = $organization->startups()->latest()->first() ?? new Startup(['organization_id' => $organization->id]);

        $startup->fill($request->validated());
        $startup->save();

        $analysis = $gemini->analyzeStartup($startup, $organization);

        if ($analysis !== null) {
            $startup->update([
                'ai_analysis' => $analysis,
                'ai_analyzed_at' => now(),
            ]);
        }

        return redirect()->route('startup.analysis');
    }

    public function analysis(): View|RedirectResponse
    {
        $organization = $this->currentOrganization(request()->user());
        $startup = $organization->startups()->latest()->first();

        if ($startup === null) {
            return redirect()->route('startup.create');
        }

        return view('onboarding.analysis', [
            'startup' => $startup,
            'organization' => $organization,
        ]);
    }

    private function currentOrganization(User $user): Organization
    {
        return $user->organizations()->wherePivot('role', 'owner')->firstOrFail();
    }
}
