@extends('layouts.app')
@section('title', 'DASHBOARD')
@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">Rekap Hafalan</h3>

    <!-- Tabel Data Siswa -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Hafalan Terakhir</th>
                    <th>Target Hafalan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kelas'] }}</td>
                        <td>{{ $item['hafalan'] }}</td>
                        <td>{{ $item['target'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
