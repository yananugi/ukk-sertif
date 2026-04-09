<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib diimport

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('index');
    }

    // Menangani proses login (POST)
    public function processLogin(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cek ke Database (Auth::attempt otomatis nge-hash password buat dicek)
        if (Auth::attempt($credentials)) {
            // Kalau berhasil, buat session baru
            $request->session()->regenerate();

            // Lempar ke dashboard
            return redirect()->intended('/dashboard');
        }

        // 3. Kalau gagal, balikin ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah, silakan cek kembali.',
        ])->onlyInput('email');
    }

    // Menangani Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
