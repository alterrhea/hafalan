@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="my-4">Tambah Siswa</h3>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" id="kelas" required>
        </div>

        <button type="submit" class="btn btn-success">Tambah</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
