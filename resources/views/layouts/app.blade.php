<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Manajemen Hafalan')</title>

    <!-- Link ke CSS dan Framework (misalnya Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <!-- Tambahkan stylesheet lainnya jika perlu -->
</head>
<body>
    <div id="app">
        <!-- Navbar (Header) -->
        <header class="bg-light shadow-sm">
            <div class="container d-flex align-items-center justify-content-between py-3">
                <!-- Logo Kiri -->
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 100px;" class="me-2">
                    <span class="font-weight-bold">Sistem Manajemen Hafalan</span>
                </a>

                <!-- Nama User dan Menu Kanan -->
                <div class="d-flex align-items-center">
                    <span class="me-3">Welcome, {{ auth()->user()->nama }}</span>
                    <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary me-2">Siswa</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container mt-4">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="bg-light py-3 mt-4">
            <div class="container text-center">
                <p>&copy; 2025 MTsN1 Karanganyar. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
