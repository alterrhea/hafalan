<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HafalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Hafalan::create([
        'siswa_id' => 1, // Mengacu pada siswa dengan ID 1
        'hari' => 'Senin',
        'tanggal' => '2025-01-12',
        'hafalan' => 'Al Haqqah 1-10',
        'target' => '11-20',
        'keterangan' => 'Hafalan pertama'
    ]);
}

}
