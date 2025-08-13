<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kuis;
use App\Models\Tugas;
use App\Models\Absensi;
use App\Models\Statistik;
use App\Models\User;
use App\Models\Aktivitas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard untuk siswa
   public function index()
{
    
    return view('dashboard.siswa', [
        'materiCount' => \App\Models\Materi::count(),
        'kuisCount' => \App\Models\Kuis::count(),
        'tugasCount' => \App\Models\Tugas::count(),
    ]);
}

    // Dashboard untuk guru
    public function guru()
    {
        $userId = Auth::id();

        $totalMateri     = Materi::count();
        $totalKuis       = Kuis::count();
        $totalTugas      = Tugas::where('user_id', $userId)->count();
        $totalAbsensi    = Absensi::where('user_id', $userId)->count();
        $totalStatistik  = Statistik::count();
        $totalUser       = User::count();
        $totalAktivitas  = Aktivitas::count();

        return view('dashboard.guru', compact(
            'totalMateri',
            'totalKuis',
            'totalTugas',
            'totalAbsensi',
            'totalStatistik',
            'totalUser',
            'totalAktivitas'
        ));
    }
}
