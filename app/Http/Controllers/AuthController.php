<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Autentikasi pengguna
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Jika sukses, redirect ke halaman dashboard
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
