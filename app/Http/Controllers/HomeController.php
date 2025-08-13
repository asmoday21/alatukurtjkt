<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kuis;
use App\Models\Tugas;
use App\Models\Absensi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil jumlah total data dari masing-masing tabel
        $materiCount = Materi::count();
        $kuisCount = Kuis::count();
        $tugasCount = Tugas::count();
        $absensiCount = Absensi::count();

        // Kirim ke tampilan welcome.blade.php
        return view('welcome', compact('materiCount', 'kuisCount', 'tugasCount', 'absensiCount'));
    }
}
