<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    // Menentukan kolom yang bisa diisi
    protected $fillable = ['nama', 'kelas'];

    // Relasi one-to-many dengan Hafalan
    public function hafalan()
    {
        return $this->hasMany(Hafalan::class);
    }
}
