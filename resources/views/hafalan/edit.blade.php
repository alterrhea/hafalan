@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Hafalan Siswa: {{ $hafalan->siswa->nama }}</h2>

    <!-- Form Edit Hafalan -->
    <form action="{{ route('hafalan.update', $hafalan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" class="form-control" id="hari" name="hari" value="{{ old('hari', $hafalan->hari) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $hafalan->tanggal) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="hafalan" class="form-label">Hafalan</label>
            <textarea class="form-control" id="hafalan" name="hafalan" rows="3" required>{{ old('hafalan', $hafalan->hafalan) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="target" class="form-label">Target</label>
            <input type="text" class="form-control" id="target" name="target" value="{{ old('target', $hafalan->target) }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $hafalan->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Hafalan</button>
    </form>
</div>
@endsection
