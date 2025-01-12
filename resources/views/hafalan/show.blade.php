@extends('layouts.app')
@section('content')
<div class="container mt-4">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h2 class="text-center mb-4">{{ $siswa->nama }}</h2>

    <!-- Daftar Hafalan -->
    <table class="table table-striped table-bordered">
        <thead>
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

    <!-- Tombol Tambah Hafalan -->
    <div class="text-center">
        <a href="{{ route('hafalan.create', $siswa->id) }}" class="btn btn-success">Tambah Hafalan</a>
    </div>
</div>
@endsection


