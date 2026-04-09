<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Models\Sertifikat; 
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // <--- Gue tambahin ini biar DomPDF aktif

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- GRUP GUEST (Belum Login) ---
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'processLogin'])->name('login.process');
});

// --- GRUP AUTH (Sudah Login) ---
Route::middleware(['auth'])->group(function () {
    
    // 1. Dashboard Utama (Statistik Status Download)
    Route::get('/dashboard', function () {
        $stats = [
            'total_sertifikat' => Sertifikat::count(),
            'sudah_diunduh'    => Sertifikat::where('status', 'sudah')->count(),
            'belum_diunduh'    => Sertifikat::where('status', 'belum')->count(),
        ];
        return view('dashboard.index', compact('stats'));
    })->name('dashboard');

    // 2. Daftar Sertifikat (Search & Filter)
    Route::get('/sertifikat', function () {
        $query = Sertifikat::query();

        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                  ->orWhere('nis', 'like', '%' . request('search') . '%');
        }

        if (request('jurusan')) {
            $query->where('jurusan', request('jurusan'));
        }

        $dataSertifikat = $query->latest()->get();
        return view('dashboard.sertifikat', compact('dataSertifikat'));
    })->name('sertifikat');

    // 3. Form Tambah Sertifikat
    Route::get('/tambah-sertifikat', function () {
        return view('dashboard.tambah-sertifikat');
    })->name('tambah.sertifikat');
    
    // 4. Proses Simpan (Default status: belum)
    Route::post('/tambah-sertifikat', function () {
        $validated = request()->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required',
            'dudi' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);
        
        // Simpan data (Status otomatis 'belum' dari database)
        Sertifikat::create($validated);
        
        return redirect()->route('sertifikat')->with('success', 'Sertifikat berhasil ditambahkan!');
    })->name('tambah.sertifikat.store');

    // 5. FITUR DOWNLOAD PDF & UPDATE STATUS (Gue taruh di sini)
Route::get('/sertifikat/download/{id}', function ($id) {
    $sertifikat = Sertifikat::findOrFail($id);
    $sertifikat->update(['status' => 'sudah']);

    // Load view & atur opsi buat gambar
    $pdf = Pdf::loadView('dashboard.cetak-sertifikat', compact('sertifikat'))
              ->setPaper('a4', 'landscape')
              ->setOptions([
                  'isHtml5ParserEnabled' => true,
                  'isRemoteEnabled' => true, // Biar gambar lokal bisa kebaca
                  'chroot' => public_path(),  // Ngunci akses folder ke public
              ]);

    return $pdf->download('Sertifikat_' . $sertifikat->nama . '.pdf');
})->name('sertifikat.download');
    // 6. Proses Logout
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
    
});