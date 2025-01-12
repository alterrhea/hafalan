@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="my-4">Edit Siswa</h3>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $siswa->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $siswa->kelas }}" required>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
