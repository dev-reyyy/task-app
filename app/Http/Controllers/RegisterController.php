<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $userData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:100', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('dashboard.main')->with('toast', [
            'type' => 'success',
            'message' => 'Welcome! Your account has been created successfully'
        ]);
    }
}
