<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('search');

    // Ambil semua data siswa (urutkan berdasarkan nama secara ascending)
    $siswa = Siswa::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('nama', 'like', "%$query%");
    })->orderBy('nama', 'asc')->get(); // Urutkan dari A-Z

    // Hitung total siswa
    $totalSiswa = Siswa::count();

    return view('siswa.index', compact('siswa', 'totalSiswa'));
}

    
    



    // Menampilkan form untuk tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    // Menghapus siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }

    public function show($id)
{
    $siswa = Siswa::findOrFail($id);
    $hafalans = Hafalan::where('siswa_id', $id)->get();

    return view('hafalan.show', compact('siswa', 'hafalans'));
}

}

