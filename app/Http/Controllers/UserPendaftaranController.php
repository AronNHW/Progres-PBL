<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class UserPendaftaranController extends Controller
{
    public function showPendaftaranForm()
    {
        $divisis = Divisi::all();
        return view('user.pendaftaran', compact('divisis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'hp' => 'required|string|max:255',
            'divisi_id' => 'required|exists:divisis,id',
            'alasan' => 'required|string',
        ]);

        Pendaftaran::create([
            'name' => $request->nama,
            'nim' => $request->nim,
            'hp' => $request->hp,
            'divisi_id' => $request->divisi_id,
            'alasan_bergabung' => $request->alasan,
        ]);

        return redirect()->route('user.pendaftaran')->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar.')->withFragment('pendaftaran-form');
    }
}