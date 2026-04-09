@extends('layouts.dashboard')

@section('title', 'Beranda - E-Sertifikat PKL')

@section('content')
<h4 class="mb-4">
    <i class="fas fa-home me-2 text-primary"></i>Beranda
</h4>

<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card card-stat h-100 shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-primary bg-opacity-10 text-primary me-3 p-3 rounded">
                    <i class="fas fa-file-alt fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Sertifikat</h6>
                    <h3 class="mb-0 fw-bold">{{ $stats['total_sertifikat'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card card-stat h-100 shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-success bg-opacity-10 text-success me-3 p-3 rounded">
                    <i class="fas fa-check-circle fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Sudah Diunduh</h6>
                    <h3 class="mb-0 fw-bold">{{ $stats['sudah_diunduh'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card card-stat h-100 shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-warning bg-opacity-10 text-warning me-3 p-3 rounded">
                    <i class="fas fa-clock fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Belum Diunduh</h6>
                    <h3 class="mb-0 fw-bold">{{ $stats['belum_diunduh'] }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<h6 class="mb-3 text-muted fw-bold">Akses Cepat</h6>
<div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ route('tambah.sertifikat') }}" class="text-decoration-none">
            <div class="card card-menu h-100 shadow-sm border-0 border-top border-primary border-4">
                <div class="card-body text-center p-4">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                        <i class="fas fa-plus-circle fa-2x"></i>
                    </div>
                    <h6 class="mb-2 fw-bold text-dark">Tambah Sertifikat</h6>
                    <p class="small text-muted mb-0">Input data sertifikat baru</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-3">
        <a href="{{ route('sertifikat') }}" class="text-decoration-none">
            <div class="card card-menu h-100 shadow-sm border-0 border-top border-success border-4">
                <div class="card-body text-center p-4">
                    <div class="icon-box bg-success bg-opacity-10 text-success mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                        <i class="fas fa-download fa-2x"></i>
                    </div>
                    <h6 class="mb-2 fw-bold text-dark">Unduh Sertifikat</h6>
                    <p class="small text-muted mb-0">Download sertifikat PKL siswa</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card card-menu h-100 shadow-sm border-0 border-top border-info border-4">
            <div class="card-body text-center p-4">
                <div class="icon-box bg-info bg-opacity-10 text-info mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                    <i class="fas fa-info-circle fa-2x"></i>
                </div>
                <h6 class="mb-2 fw-bold text-dark">Bantuan</h6>
                <p class="small text-muted mb-0">Hubungi mantanmu aja mas programmernya lagi ga mood.</p>
            </div>
        </div>
    </div>
</div>
@endsection