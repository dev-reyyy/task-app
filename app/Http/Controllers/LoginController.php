<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function login() {
        
        return view('auth.login');
    }
    
    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $maxAttempts = 5;
        $decaySeconds = 180;

        // Create a unique key per IP
        $throttleKey = $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()
                ->withErrors(['email' => "Too many login attempts. Try again in {$seconds} seconds.",]);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            // Successful login clears attempts
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('toast', [
                'type' => 'success',
                'message' => 'Welcome back! You are now logged in!',
            ]);
        }

        RateLimiter::hit($throttleKey, $decaySeconds);

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
