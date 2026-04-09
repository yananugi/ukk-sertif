@extends('layouts.dashboard')

@section('title', 'Unduh Sertifikat - E-Sertifikat PKL')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">
        <i class="fas fa-download me-2 text-primary"></i>Unduh Sertifikat
    </h4>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('sertifikat') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="🔍 Cari nama siswa atau NIS..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="jurusan" class="form-select">
                        <option value="">Semua Jurusan</option>
                        <option value="RPL" {{ request('jurusan') == 'RPL' ? 'selected' : '' }}>RPL - Rekayasa Perangkat Lunak</option>
                        <option value="TKJ" {{ request('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ - Teknik Komputer Jaringan</option>
                        <option value="MM" {{ request('jurusan') == 'MM' ? 'selected' : '' }}>MM - Multimedia</option>
                        <option value="AKL" {{ request('jurusan') == 'AKL' ? 'selected' : '' }}>AKL - Akuntansi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jurusan</th>
                        <th>DUDI</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataSertifikat as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><code>{{ $s->nis }}</code></td>
                        <td><strong>{{ $s->nama }}</strong></td>
                        <td>{{ $s->jurusan }}</td>
                        <td>{{ $s->dudi }}</td>
                        <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d M Y') }}</td>
                        <td>
                            @if($s->status == 'sudah')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success">
                                    <i class="fas fa-check-circle me-1"></i> Sudah Diunduh
                                </span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">
                                    <i class="fas fa-clock me-1"></i> Belum Diunduh
                                </span>
                            @endif
                        </td>
                        <td>
                            {{-- Link Download PDF yang beneran jalan --}}
                            <a href="{{ route('sertifikat.download', $s->id) }}" class="btn btn-sm {{ $s->status == 'sudah' ? 'btn-outline-success' : 'btn-info' }} text-white">
                                <i class="fa-solid fa-download me-1"></i> Unduh
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted p-4">Belum ada data sertifikat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection