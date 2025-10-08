<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('pengurus.prestasi.index', compact('prestasis', 'tingkat_kegiatans', 'keterangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tingkat_kegiatans = ['Internal (Kampus)', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
        $keterangans = ['Akademik', 'Non-Akademik'];
        return view('pengurus.prestasi.create', compact('tingkat_kegiatans', 'keterangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'program_studi' => 'required|string|max:100',
            'nama_kegiatan' => 'required|string|max:255',
            'waktu_penyelenggaraan' => 'required|date',
            'tingkat_kegiatan' => ['required', Rule::in(['Internal (Kampus)', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'])],
            'prestasi_yang_dicapai' => 'required|string|max:255',
            'keterangan' => ['required', Rule::in(['Akademik', 'Non-Akademik'])],
            'bukti_prestasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pembimbing' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('bukti_prestasi')) {
            $path = $request->file('bukti_prestasi')->store('prestasi', 'public');
            $validatedData['bukti_prestasi'] = $path;
        }

        Prestasi::create($validatedData);

        return redirect()->route('pengurus.prestasi.index')->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        return view('pengurus.prestasi.show', compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        $tingkat_kegiatans = ['Internal (Kampus)', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
        $keterangans = ['Akademik', 'Non-Akademik'];
        return view('pengurus.prestasi.edit', compact('prestasi', 'tingkat_kegiatans', 'keterangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'program_studi' => 'required|string|max:100',
            'nama_kegiatan' => 'required|string|max:255',
            'waktu_penyelenggaraan' => 'required|date',
            'tingkat_kegiatan' => ['required', Rule::in(['Internal (Kampus)', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'])],
            'prestasi_yang_dicapai' => 'required|string|max:255',
            'keterangan' => ['required', Rule::in(['Akademik', 'Non-Akademik'])],
            'bukti_prestasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pembimbing' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('bukti_prestasi')) {
            // Delete old file
            if ($prestasi->bukti_prestasi) {
                Storage::disk('public')->delete($prestasi->bukti_prestasi);
            }
            // Store new file
            $path = $request->file('bukti_prestasi')->store('prestasi', 'public');
            $validatedData['bukti_prestasi'] = $path;
        }

        $prestasi->update($validatedData);

        return redirect()->route('pengurus.prestasi.index')->with('success', 'Data prestasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        // Delete file
        if ($prestasi->bukti_prestasi) {
            Storage::disk('public')->delete($prestasi->bukti_prestasi);
        }

        $prestasi->delete();
        return redirect()->route('pengurus.prestasi.index')->with('success', 'Data prestasi berhasil dihapus.');
    }
}