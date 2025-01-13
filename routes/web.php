<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HafalanController;

// Redirect dari "/" ke "/login"
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute untuk login dan logout

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('siswa', SiswaController::class);
Route::resource('hafalan', HafalanController::class);
// Route untuk menampilkan daftar siswa
Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('siswa.index');

// Route untuk menampilkan form tambah siswa
Route::get('/admin/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.create');

// Route untuk menyimpan siswa baru
Route::post('/admin/siswa', [SiswaController::class, 'store'])->name('siswa.store');

// Route untuk menampilkan form edit siswa
Route::get('/admin/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');

// Route untuk memperbarui siswa
Route::put('/admin/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');

// Route untuk menghapus siswa
Route::delete('/admin/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('hafalan/{siswa}', [HafalanController::class, 'show'])->name('hafalan.siswa');
Route::get('hafalan/create/{siswa}', [HafalanController::class, 'create'])->name('hafalan.create');
Route::post('hafalan/store', [HafalanController::class, 'store'])->name('hafalan.store');
Route::get('hafalan/edit/{hafalan}', [HafalanController::class, 'edit'])->name('hafalan.edit');
Route::put('hafalan/update/{hafalan}', [HafalanController::class, 'update'])->name('hafalan.update');
Route::delete('hafalan/delete/{hafalan}', [HafalanController::class, 'destroy'])->name('hafalan.destroy');

