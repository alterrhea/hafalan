<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Hafalan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data siswa
        $siswa = Siswa::all();

        // Mengambil hafalan dan target terakhir untuk setiap siswa
        $data = [];
        foreach ($siswa as $s) {
            $lastHafalan = Hafalan::where('siswa_id', $s->id)->latest()->first();
            $data[] = [
                'nama' => $s->nama,
                'kelas' => $s->kelas,
                'hafalan' => $lastHafalan ? $lastHafalan->hafalan : 'Belum ada hafalan',
                'target' => $lastHafalan ? $lastHafalan->target : 'Belum ada target',
            ];
        }

        return view('dashboard', compact('data'));
    }
}
