<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PublicController extends Controller
{
    public function index(): View
    {
        return view('public.index');
    }

    public function login(): View
    {
        return view('public.login');
    }

    public function register(): View
    {
        return view('public.register');
    }

    public function roleSelect(): View
    {
        return view('public.role-select');
    }

    public function publicPassport(): View
    {
        return view('public.public-passport');
    }

    public function allPages(): View
    {
        return view('public.all-pages');
    }
}
