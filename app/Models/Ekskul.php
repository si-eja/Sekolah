<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    //
    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'jadwal',
        'deksripsi',
        'gambar'
    ];
}
