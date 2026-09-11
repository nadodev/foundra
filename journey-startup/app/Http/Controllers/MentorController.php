<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MentorController extends Controller
{
    public function index(): View
    {
        return view('mentor.index');
    }

    public function startups(): View
    {
        return view('mentor.startups');
    }

    public function startupDetail(): View
    {
        return view('mentor.startup-detail');
    }

    public function sessions(): View
    {
        return view('mentor.sessions');
    }

    public function feedback(): View
    {
        return view('mentor.feedback');
    }

    public function profile(): View
    {
        return view('mentor.profile');
    }
}
