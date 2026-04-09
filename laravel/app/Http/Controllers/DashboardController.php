<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // 🏠 Dashboard Home
    public function index()
    {
        return view('dashboard.index');
    }

    // 📥 Menu 1: Unduh Sertifikat Baru
    public function sertifikatBaru()
    {
        // Contoh: ambil data siswa yang belum download sertifikat
        // $data = Siswa::where('status', 'aktif')->get();
        return view('dashboard.sertifikat-baru');
    }

    // 📂 Menu 2: Unduh Sertifikat Lama
    public function sertifikatLama()
    {
        // Contoh: ambil riwayat download sebelumnya
        // $data = RiwayatDownload::where('user_id', Auth::id())->get();
        return view('dashboard.sertifikat-lama');
    }
    public function settings()
    {
        return view('dashboard.settings');
    }
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
        ]);

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}