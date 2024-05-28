<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://kel6-be-layananweb.test/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            // Handle success (e.g., save token, redirect)
            return redirect()->intended('dashboard');
        } else {
            // Handle failure (e.g., return to login with error message)
            return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
        }
    }
}
