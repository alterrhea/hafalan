<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HafalanController extends Controller
{
    public function index()
    {
        $hafalans = Hafalan::all();
        return view('hafalan.index', compact('hafalans'));
    }

    public function create($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('hafalan.create', compact('siswa'));
    }
    

    public function show($id)
    {
    // Ambil data siswa berdasarkan ID
    $siswa = Siswa::findOrFail($id);
    
    // Ambil hafalan siswa berdasarkan ID siswa
    $hafalans = Hafalan::where('siswa_id', $id)->get();
    
    // Kirim data siswa dan hafalan ke view
    return view('hafalan.show', compact('siswa', 'hafalans'));
    }   
    public function store(Request $request)
    {
    $validated = $request->validate([
        'siswa_id' => 'required|exists:siswa,id',
        'hari' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'hafalan' => 'required|string',
        'target' => 'required|string',
        'keterangan' => 'nullable|string',
    ]);

    Hafalan::create($validated);

    return redirect()->route('hafalan.siswa', $request->siswa_id)
                     ->with('success', 'Hafalan berhasil ditambahkan');
    }

    public function edit($id)
    {
    $hafalan = Hafalan::findOrFail($id);
    return view('hafalan.edit', compact('hafalan'));
    }

    public function update(Request $request, $id)
    {
    $validated = $request->validate([
        'hari' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'hafalan' => 'required|string',
        'target' => 'required|string',
        'keterangan' => 'nullable|string',
    ]);

    $hafalan = Hafalan::findOrFail($id);
    $hafalan->update($validated);

    return redirect()->route('hafalan.siswa', $hafalan->siswa_id)
                     ->with('success', 'Hafalan berhasil diperbarui');
    }

    public function destroy($id)
    {
    $hafalan = Hafalan::findOrFail($id);
    $siswa_id = $hafalan->siswa_id;  // Menyimpan ID siswa sebelum dihapus

    $hafalan->delete();

    return redirect()->route('hafalan.siswa', $siswa_id)
                     ->with('success', 'Hafalan berhasil dihapus');
    }

    // Metode lainnya sesuai dengan kebutuhan
}

