<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get credentials with role check
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the logged-in user
           
            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Welcome Admin!');
            } elseif ($user->role === 'user') {
                return redirect()->route('dashboard')->with('success', 'Welcome User!');
            } else {
                Auth::logout(); // Log out if the role is not recognized
                return back()->with('error', 'Unauthorized access.');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
