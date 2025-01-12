<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    protected $table = 'hafalan';
    // Menentukan kolom yang bisa diisi
    protected $fillable = ['siswa_id', 'hari', 'tanggal', 'hafalan', 'target', 'keterangan'];

    // Relasi many-to-one dengan Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

