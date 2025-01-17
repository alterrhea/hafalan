@extends('layouts.app')
@section('title', 'SISWA')
@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Siswa</h2>

    <!-- Fitur Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form method="GET" action="{{ route('siswa.index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari siswa..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
         <!-- Tombol Tambah Siswa -->
        <div>
            <a href="{{ route('siswa.create') }}" class="btn btn-success">Tambah Siswa</a>
        </div>
    </div>

    <!-- Total Siswa -->
    <div class="mb-3">
        <strong>Total Siswa: </strong> {{ $totalSiswa }}
    </div>

    <!-- Daftar Siswa -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $index => $s)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><a href="{{ route('hafalan.siswa', $s->id) }}" class="text-decoration-none text-dark">{{ $s->nama }}</a></td>
                <td>{{ $s->kelas }}</td>
                <td>
                    <!-- Tombol Hafalan -->
                    <a href="{{ route('hafalan.siswa', $s->id) }}" class="btn btn-sm btn-info">Hafalan</a>
                    
                    <!-- Tombol Edit -->
                    <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <!-- Form Hapus Siswa -->
                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
