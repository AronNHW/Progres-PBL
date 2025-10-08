<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'program_studi',
        'nama_kegiatan',
        'waktu_penyelenggaraan',
        'tingkat_kegiatan',
        'prestasi_yang_dicapai',
        'keterangan',
        'bukti_prestasi',
        'pembimbing',
    ];
}
