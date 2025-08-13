<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapAbsensiController extends Controller
{
    // Guru - Lihat rekap semua absensi dan jumlah kehadiran per siswa
    public function index()
    {
        $rekap = Absensi::withCount(['kehadiran'])->orderByDesc('tanggal')->get();
        return view('absensi.rekap', compact('rekap'));
        $aktivitas = \App\Models\AktivitasSiswa::where('user_id', auth()->id())->latest()->get();
    return view('aktivitas.index', compact('aktivitas'));
    }

    // (Opsional) Lihat detail kehadiran siswa per absensi
    public function siswa($id)
    {
        $absensi = Absensi::with('kehadiran.user')->findOrFail($id);
        return view('absensi.detail', compact('absensi'));
    }

    // Siswa - Riwayat absensi pribadi
    public function riwayatSiswa()
    {
        $absensi = Absensi::with(['kehadiran' => function ($q) {
            $q->where('user_id', Auth::id());
        }])->orderByDesc('tanggal')->get();

        return view('absensi.riwayat-siswa', compact('absensi'));
    }

    // Tambahan untuk dashboard siswa dan guru
    public static function countHadirToday()
    {
        $today = now()->toDateString();
        return Absensi::where('tanggal', $today)->withCount('kehadiran')->first();
    }

    public static function siswaStatusHariIni()
    {
        $today = now()->toDateString();
        $absensi = Absensi::where('tanggal', $today)->first();
        if (!$absensi) return null;

        return $absensi->kehadiran()->where('user_id', Auth::id())->exists();
    }

    
}