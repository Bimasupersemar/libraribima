<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'NamaLengkap' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
            'peran' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'NamaLengkap' => $request->NamaLengkap,
            'alamat' => $request->alamat, 
            'peran' => 'user',
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home'); 
        }

        return back()->withErrors([
            'username'|'password' => 'username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

