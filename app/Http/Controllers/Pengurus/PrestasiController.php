<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%");
        }

        $prestasis = $query->latest()->paginate(10)->withQueryString();

        return view('pengurus.prestasi.index', compact('prestasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'sistem_kuliah' => 'required|string|max:50',
            'ipk' => 'required|numeric|min:0|max:4',
            'periode' => 'required|string|max:50',
        ]);

        Prestasi::create($request->all());

        return redirect()->route('pengurus.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        // Not typically used for admin panels, redirecting to index.
        return redirect()->route('pengurus.prestasi.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        return view('pengurus.prestasi.edit', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'sistem_kuliah' => 'required|string|max:50',
            'ipk' => 'required|numeric|min:0|max:4',
            'periode' => 'required|string|max:50',
        ]);

        $prestasi->update($request->all());

        return redirect()->route('pengurus.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        return redirect()->route('pengurus.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}
