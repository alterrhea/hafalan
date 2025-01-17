@extends('layouts.app')
@section('title', 'TAMBAH HAFALAN')
@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">{{ $siswa->nama }}</h2>

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

<script>
    // Mengatur Tanggal Otomatis
    window.onload = function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // Januari = 0
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('tanggal').value = today;

        // Mengatur Hari Otomatis dalam Bahasa Indonesia
        var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var dayName = days[new Date().getDay()]; // Mengambil nama hari dari objek Date yang baru
        document.getElementById('hari').value = dayName;
    };
</script>

@endsection
