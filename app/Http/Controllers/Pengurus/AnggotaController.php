<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function calonAnggota()
    {
        $candidates = Pendaftaran::whereNotIn('status', ['Approved Stage 1', 'Rejected Stage 1', 'Anggota Aktif', 'Rejected Stage 2'])->get();
        return view('pengurus.calon-anggota.index', compact('candidates'));
    }

    public function destroy($id)
    {
        $candidate = Pendaftaran::findOrFail($id);
        $candidate->delete();

        return redirect()->route('pengurus.calon-anggota.index')->with('success', 'Calon anggota berhasil dihapus.');
    }


    public function calonAnggotaTahap1()
    {
        $candidates = Pendaftaran::whereIn('status', ['Approved Stage 1', 'Rejected Stage 1'])->get();
        return view('pengurus.calon-anggota-tahap-1.index', compact('candidates'));
    }

    public function calonAnggotaTahap2()
    {
        $candidates = Pendaftaran::where('status', 'Approved Stage 1')->get();
        return view('pengurus.calon-anggota-tahap-2.index', compact('candidates'));
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

    public function approveCandidateStage2(Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'Anggota Aktif';
        $pendaftaran->save();

        return redirect()->route('pengurus.calon-anggota-tahap-2.index')->with('success', 'Calon anggota berhasil diterima menjadi anggota aktif.');
    }

    public function rejectCandidateStage2(Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'Rejected Stage 2';
        $pendaftaran->save();

        return redirect()->route('pengurus.calon-anggota-tahap-2.index')->with('success', 'Calon anggota berhasil ditolak pada tahap 2.');
    }

    public function kelolaAnggotaHimati()
    {
        $members = Pendaftaran::where('status', 'Anggota Aktif')->latest()->paginate(10);
        return view('pengurus.kelola-anggota-himati.index', compact('members'));
    }
}