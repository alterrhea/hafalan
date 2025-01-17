<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Manajemen Hafalan')</title>

    <!-- Link ke CSS dan Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light text-dark">
    <div id="app">
        <!-- Navbar -->
        <header class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm py-3">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Kiri: Logo dan Nama Sistem -->
                <a href="{{ url('dashboard') }}" class="navbar-brand d-flex align-items-center text-white">
                    <span class="fw-bold">Manajemen Hafalan</span>
                </a>
                
                <!-- Tengah: Judul Halaman -->
                <span class="fw-semibold text-white d-none d-lg-block">@yield('title')</span>
                
                <!-- Kanan: Navigasi -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('siswa.index') }}" class="btn btn-outline-light me-3">Siswa</a>
                    <!-- Dropdown Profil -->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-icon rounded-circle d-flex align-items-center justify-content-center text-white">
                                {{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end bg-primary text-white border-0">
                            <li class="px-3 py-2 text-center fw-bold">{{ auth()->user()->nama }}</li>
                            <li><hr class="dropdown-divider bg-white"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item text-white text-center">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container mt-4 p-4 bg-white rounded shadow-sm text-dark">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="bg-primary text-white text-center py-3 mt-4">
            <p>&copy; 2025 MTsN1 Karanganyar. All Rights Reserved.</p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    // AJAX Live Search
    document.getElementById("searchInput").addEventListener("input", function() {
        let query = this.value.trim();
        fetch(`{{ route('siswa.index') }}?search=${query}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById("siswaList").innerHTML = new DOMParser().parseFromString(html, "text/html").getElementById("siswaList").innerHTML;
            });
    });

    // Modal Konfirmasi Hapus
    let deleteId;
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function() {
            deleteId = this.getAttribute("data-id");
            let deleteForm = document.getElementById("deleteForm");
            deleteForm.action = `/siswa/${deleteId}`;
            new bootstrap.Modal(document.getElementById("confirmDeleteModal")).show();
        });
    });
});
</script>

</body>
</html>
