<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = [
        'photo_divisi',
        'nama_divisi',
        'deskripsi',
    ];
}
