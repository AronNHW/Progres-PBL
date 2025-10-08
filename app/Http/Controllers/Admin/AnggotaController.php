<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function calonAnggota()
    {
        $candidates = Pendaftaran::whereNotIn('status', ['Approved Stage 1', 'Rejected Stage 1', 'Anggota Aktif', 'Gagal Wawancara'])->get();
        return view('admin.calon-anggota.index', compact('candidates'));
    }

    public function calonAnggotaTahap1()
    {
        $candidates = Pendaftaran::whereIn('status', ['Approved Stage 1', 'Rejected Stage 1'])->get();
        return view('admin.calon-anggota-tahap-1.index', compact('candidates'));
    }

    public function calonAnggotaTahap2()
    {
        $candidates = Pendaftaran::where('status', 'Approved Stage 1')->get();
        return view('admin.calon-anggota-tahap-2.index', compact('candidates'));
    }

    public function approveCandidate(Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'Approved Stage 1';
        $pendaftaran->save();

        return redirect()->back()->with('success', 'Calon anggota berhasil diterima tahap 1.');
    }

    public function rejectCandidate(Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'Rejected Stage 1';
        $pendaftaran->save();

        return redirect()->back()->with('success', 'Calon anggota berhasil ditolak tahap 1.');
    }

    public function passInterview(Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'Anggota Aktif';
        $pendaftaran->save();

        return redirect()->route('admin.calon-anggota-tahap-2.index')->with('success', 'Kandidat telah dikonfirmasi lulus wawancara dan menjadi anggota aktif.');
    }

    public function failInterview(Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'Gagal Wawancara';
        $pendaftaran->save();

        return redirect()->route('admin.calon-anggota-tahap-2.index')->with('success', 'Kandidat telah dikonfirmasi tidak lulus wawancara.');
    }

    public function kelolaAnggotaHimati()
    {
        $members = Pendaftaran::where('status', 'Anggota Aktif')->latest()->paginate(10);
        return view('admin.kelola-anggota-himati.index', compact('members'));
    }


    public function update(Request $request, Pendaftaran $anggotum)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'hp' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
        ]);

        $anggotum->update($request->only(['name', 'nim', 'hp', 'divisi']));

        return redirect()->route('admin.kelola-anggota-himati.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Pendaftaran $anggotum)
    {
        $anggotum->delete();
        return redirect()->route('admin.kelola-anggota-himati.index')->with('success', 'Anggota berhasil dihapus.');
    }
}