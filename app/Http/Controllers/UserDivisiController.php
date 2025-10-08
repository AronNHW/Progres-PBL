<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class UserDivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::all();
        return view('user.divisi', compact('divisis'));
    }

    public function show(Divisi $divisi)
    {
        return view('user.divisi-show', compact('divisi'));
    }
}
