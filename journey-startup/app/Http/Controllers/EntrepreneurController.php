<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateStartupSettingsRequest;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EntrepreneurController extends Controller
{
    public function overview(): View
    {
        $organization = $this->currentOrganization(request()->user());

        return view('entrepreneur.overview', [
            'organization' => $organization,
            'startup' => $organization->startups()->latest()->first(),
        ]);
    }

    public function journey(): View
    {
        return view('entrepreneur.journey');
    }

    public function history(): View
    {
        return view('entrepreneur.history');
    }

    public function validation(): View
    {
        return view('entrepreneur.validation');
    }

    public function experiments(): View
    {
        return view('entrepreneur.experiments');
    }

    public function research(): View
    {
        return view('entrepreneur.research');
    }

    public function evidence(): View
    {
        return view('entrepreneur.evidence');
    }

    public function interviews(): View
    {
        return view('entrepreneur.interviews');
    }

    public function newInterview(): View
    {
        return view('entrepreneur.new-interview');
    }

    public function interviewDetail(): View
    {
        return view('entrepreneur.interview-detail');
    }

    public function competitors(): View
    {
        return view('entrepreneur.competitors');
    }

    public function businessModel(): View
    {
        return view('entrepreneur.business-model');
    }

    public function mvp(): View
    {
        return view('entrepreneur.mvp');
    }

    public function pitch(): View
    {
        return view('entrepreneur.pitch');
    }

    public function pitchCoach(): View
    {
        return view('entrepreneur.pitch-coach');
    }

    public function readiness(): View
    {
        return view('entrepreneur.readiness');
    }

    public function passport(): View
    {
        return view('entrepreneur.passport');
    }

    public function milestones(): View
    {
        return view('entrepreneur.milestones');
    }

    public function mentors(): View
    {
        return view('entrepreneur.mentors');
    }

    public function documents(): View
    {
        return view('entrepreneur.documents');
    }

    public function notifications(): View
    {
        return view('entrepreneur.notifications');
    }

    public function journeyAi(): View
    {
        return view('entrepreneur.journey-ai');
    }

    public function settings(): View
    {
        $organization = $this->currentOrganization(request()->user());

        return view('entrepreneur.settings', [
            'startup' => $organization->startups()->latest()->first(),
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return back()->with('status', 'Perfil atualizado com sucesso.');
    }

    public function updateStartup(UpdateStartupSettingsRequest $request): RedirectResponse
    {
        $startup = $this->currentOrganization($request->user())->startups()->latest()->firstOrFail();
        $startup->update($request->validated());

        return back()->with('status', 'Dados da startup atualizados com sucesso.');
    }

    private function currentOrganization(User $user): Organization
    {
        return $user->organizations()->wherePivot('role', 'owner')->firstOrFail();
    }
}
