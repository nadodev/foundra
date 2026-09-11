<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUser;
use App\Http\Requests\StoreAuthenticatedSessionRequest;
use App\Http\Requests\StoreRegistrationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(StoreAuthenticatedSessionRequest $request): RedirectResponse
    {
        $credentials = $request->safe()->only(['email', 'password']);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'As credenciais informadas não conferem.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('entrepreneur.overview'));
    }

    public function register(StoreRegistrationRequest $request, RegisterUser $registerUser): RedirectResponse
    {
        $user = $registerUser->handle($request->safe()->only(['name', 'email', 'password']));

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('role.select');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
