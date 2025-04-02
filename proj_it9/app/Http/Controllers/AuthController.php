<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.pin-login');
    }

    public function login(Request $request)
    {
        $request->validate(['pin' => 'required|digits:4']);

        $user = User::where('pin', $request->pin)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['pin' => 'Invalid PIN']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}