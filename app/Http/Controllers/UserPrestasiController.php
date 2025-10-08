<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class UserPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_mahasiswa', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('nama_kegiatan', 'like', "%{$search}%");
            });
        }

        // Filter
        if ($request->filled('tingkat_kegiatan')) {
            $query->where('tingkat_kegiatan', $request->tingkat_kegiatan);
        }
        if ($request->filled('keterangan')) {
            $query->where('keterangan', $request->keterangan);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'waktu_penyelenggaraan');
        $sortDirection = $request->get('sort_direction', 'desc');
        if (in_array($sortBy, ['nama_mahasiswa', 'waktu_penyelenggaraan', 'tingkat_kegiatan', 'keterangan']) && in_array($sortDirection, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDirection);
        }

        $prestasis = $query->paginate(10)->withQueryString();

        // Data for filters
        $tingkat_kegiatans = ['Internal (Kampus)', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
        $keterangans = ['Akademik', 'Non-Akademik'];

        return view('user.prestasi.index', compact('prestasis', 'tingkat_kegiatans', 'keterangans'));
    }
}