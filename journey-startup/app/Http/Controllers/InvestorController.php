<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class InvestorController extends Controller
{
    public function discovery(): View
    {
        return view('investor.discovery');
    }
}
