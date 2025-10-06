<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%");
        }

        $prestasis = $query->latest()->paginate(10)->withQueryString();

        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

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

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

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

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}
