<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function login()
    {
        return view('auth.login');
    }

    // Handle login
    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah.'
        ])->withInput($request->except('password'));
    }

    // Show register form
    public function register()
    {
        return view('auth.register');
    }

    // Handle register
    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto login after register
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Logging untuk debugging CSRF (opsional, bisa dihapus setelah masalah terselesaikan)
        Log::info('CSRF Token: ' . $request->input('_token'));
        Log::info('Session Token: ' . $request->session()->token());

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout');
    }

    // Dashboard
    public function dashboard()
    {
        return view('dashboard');
    }
}