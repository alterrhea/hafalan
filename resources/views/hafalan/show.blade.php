@extends('layouts.app')
@section('title', 'HAFALAN')
@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-center mb-4">{{ $siswa->nama }}</h2>
    <!-- Tombol Tambah Hafalan dan Buat Laporan -->
<div class="d-flex justify-content-between mt-4">
    <a href="{{ route('hafalan.create', $siswa->id) }}" class="btn btn-success">Tambah Hafalan</a>
    <a href="#" class="btn btn-primary">Buat Laporan</a>
</div>

    <!-- Daftar Hafalan -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Hafalan</th>
                    <th>Target</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hafalans as $hafalan)
                <tr>
                    <td>{{ $hafalan->hari }}</td>
                    <td>{{ $hafalan->tanggal }}</td>
                    <td>{{ $hafalan->hafalan }}</td>
                    <td>{{ $hafalan->target }}</td>
                    <td>{{ $hafalan->keterangan }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('hafalan.edit', $hafalan->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <!-- Form Hapus Hafalan -->
                        <form action="{{ route('hafalan.destroy', $hafalan->id) }}" method="POST" style="display:inline;">
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


</div>
@endsection
