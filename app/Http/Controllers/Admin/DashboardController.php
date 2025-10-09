<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Berita;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $beritaCount = Berita::count();
        $aspirasiCount = Aspirasi::count();
        $anggotaCount = Pendaftaran::where('status', 'Anggota Aktif')->count();

        return view('admin.dashboard', compact('beritaCount', 'aspirasiCount', 'anggotaCount'));
    }
}
