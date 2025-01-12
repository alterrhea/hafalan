@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tambah Hafalan untuk Siswa: {{ $siswa->nama }}</h2>

    <!-- Form Tambah Hafalan -->
    <form action="{{ route('hafalan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
        
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" class="form-control" id="hari" name="hari" required>
        </div>
        
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        
        <div class="mb-3">
            <label for="hafalan" class="form-label">Hafalan</label>
            <textarea class="form-control" id="hafalan" name="hafalan" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="target" class="form-label">Target</label>
            <input type="text" class="form-control" id="target" name="target" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Hafalan</button>
    </form>
</div>
@endsection
