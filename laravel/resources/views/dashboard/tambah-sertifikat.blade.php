@extends('layouts.dashboard')

@section('title', 'Tambah Sertifikat - E-Sertifikat PKL')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">
        <i class="fas fa-plus-circle me-2 text-primary"></i>Tambah Sertifikat Baru
    </h4>
    <a href="{{ route('sertifikat') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-circle me-2"></i>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-file-alt me-2 text-primary"></i>Informasi Sertifikat</h6>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('tambah.sertifikat.store') }}">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
                            <input type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" 
                                   value="{{ old('nis') }}" placeholder="Contoh: 12345" required>
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama') }}" placeholder="Nama lengkap" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                            <select name="jurusan" id="jurusan" class="form-select @error('jurusan') is-invalid @enderror" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL - Rekayasa Perangkat Lunak</option>
                                <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ - Teknik Komputer Jaringan</option>
                                <option value="MM" {{ old('jurusan') == 'MM' ? 'selected' : '' }}>MM - Multimedia</option>
                                <option value="AKL" {{ old('jurusan') == 'AKL' ? 'selected' : '' }}>AKL - Akuntansi</option>
                                <option value="OTKP" {{ old('jurusan') == 'OTKP' ? 'selected' : '' }}>OTKP - Otomatisasi Tata Kelola Perkantoran</option>
                            </select>
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" 
                                   value="{{ old('kelas') }}" placeholder="Contoh: XII RPL 1">
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="dudi" class="form-label">DUDI (Dunia Usaha Dunia Industri) <span class="text-danger">*</span></label>
                        <input type="text" name="dudi" id="dudi" class="form-control @error('dudi') is-invalid @enderror" 
                               value="{{ old('dudi') }}" placeholder="Nama perusahaan/tempat PKL" required>
                        @error('dudi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai PKL</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                                   value="{{ old('tanggal_mulai') }}">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai PKL</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                                   value="{{ old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Penerbitan Sertifikat <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" 
                               value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" 
                                  rows="3" placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Sertifikat
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 📋 Info Panel -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-info-circle me-2 text-info"></i>Panduan</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 small text-muted">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Field bertanda <span class="text-danger">*</span> wajib diisi
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        NIS harus berupa angka
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Pastikan DUDI sudah terdaftar
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Tanggal tidak boleh lebih dari hari ini
                    </li>
                </ul>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0"><i class="fas fa-chart-bar me-2 text-warning"></i>Statistik</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted small">Sertifikat Bulan Ini</span>
                    <strong>25</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted small">Total Sertifikat</span>
                    <strong>150</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted small">Menunggu Verifikasi</span>
                    <strong>5</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection