<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        return view('program.index');
    }

    public function startups(): View
    {
        return view('program.startups');
    }

    public function startupDetail(): View
    {
        return view('program.startup-detail');
    }

    public function cohort(): View
    {
        return view('program.cohort');
    }

    public function mentors(): View
    {
        return view('program.mentors');
    }

    public function reports(): View
    {
        return view('program.reports');
    }

    public function notifications(): View
    {
        return view('program.notifications');
    }

    public function settings(): View
    {
        return view('program.settings');
    }
}
