@extends('layouts.app')
@section('title', 'SISWA')
@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold">Daftar Siswa</h2>

    <!-- Fitur Pencarian -->
    <div class="row mb-3 justify-content-between">
        <div class="col-md-6">
            <form method="GET" action="{{ route('siswa.index') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Cari siswa..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
        <div class="col-auto">
            <a href="{{ route('siswa.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Siswa
            </a>
        </div>
    </div>

    <!-- Total Siswa -->
    <div class="mb-3">
        <strong>Total Siswa: </strong> <span id="totalSiswa">{{ $totalSiswa }}</span>
    </div>

    <!-- Daftar Siswa - Card Layout -->
    <div class="row" id="siswaList">
        @foreach($siswa as $s)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $s->nama }}</h5>
                    <p class="card-text text-muted">{{ $s->kelas }}</p>
                    <a href="{{ route('hafalan.siswa', $s->id) }}" class="btn btn-info">
                        <i class="fas fa-book"></i> Hafalan
                    </a>
                    <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button class="btn btn-danger delete-btn" data-id="{{ $s->id }}">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus siswa ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
