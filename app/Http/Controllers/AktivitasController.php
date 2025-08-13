<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AktivitasSiswa;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = AktivitasSiswa::with('user')->latest()->paginate(20);
        return view('aktivitas.index', compact('aktivitas'));
    }
}
