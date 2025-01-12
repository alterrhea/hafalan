<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    protected $table = 'guru';
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];
}


