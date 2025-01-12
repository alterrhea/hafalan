<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run()
    {
        Guru::create([
            'nama' => 'Hanif',
            'email' => 'hanif@guru.com',
            'password' => bcrypt('hanif123'), // Gunakan bcrypt untuk meng-hash password
        ]);
    }
}

