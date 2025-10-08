<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'name',
        'nim',
        'hp',
        'prodi',
        'divisi',
        'alasan_bergabung',
        'status',
    ];
}
