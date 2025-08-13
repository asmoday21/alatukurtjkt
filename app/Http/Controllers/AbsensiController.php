<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\AktivitasSiswa;


class AbsensiController extends Controller
{
    // 👨‍🏫 Guru - Lihat semua jadwal absensi
    public function index()
    {
        $absensi = Absensi::latest()->get();
        return view('absensi.index', compact('absensi'));
    }

    // 👨‍🏫 Guru - Form buat jadwal absensi
    public function create()
    {
        return view('absensi.create');
    }

    // 👨‍🏫 Guru - Simpan jadwal absensi
    public function store(Request $request)
    {
        $request->validate([
        'nama_sesi' => 'required|string|max:255',
        'tanggal' => 'required|date|unique:absensis,tanggal',
    ], [
        'tanggal.unique' => '❗ Tanggal absensi tersebut sudah terdaftar.',
    ]);

        Absensi::create([
            'nama_sesi' => $request->nama_sesi,
            'tanggal' => $request->tanggal,
            'user_id' => Auth::id()
        ]);

        // 🔔 Tampilkan notifikasi sukses setelah redirect
    return redirect()->route('absensi.index')->with('success', 'Absen baru berhasil diupload!');

        return redirect()->route('absensi.index')->with('success', 'Jadwal absensi berhasil dibuat.');
    }

    // 🧑‍🎓 Siswa - Lihat absensi hari ini
    public function hariIni()
    {
        $today = now()->toDateString();
        $absensi = Absensi::where('tanggal', $today)->first();

        return view('absensi.hari-ini', compact('absensi'));
    }

    // 🧑‍🎓 Siswa - Klik hadir
    public function hadir($id)
    {
        $absensi = Absensi::findOrFail($id);
        $user_id = Auth::id();

        // Cek apakah sudah pernah absen
        $cek = Kehadiran::where('absensi_id', $id)->where('user_id', $user_id)->first();

        if ($cek) {
            return back()->with('info', 'Kamu sudah mengisi absensi hari ini.');
        }

        Kehadiran::create([
            'absensi_id' => $id,
            'user_id' => $user_id,
            'waktu_hadir' => Carbon::now()
        ]);
        AktivitasSiswa::create([
    'user_id' => auth()->id(),
    'aksi' => 'Absen',
    'deskripsi' => 'Mengisi absensi sesi: ' . $absensi->nama_sesi,
]);


        return back()->with('success', 'Absensi berhasil dikirim.');
    }

    // 👨‍🏫 Guru - Lihat kehadiran siswa untuk 1 jadwal
    public function detail($id)
    {
        $absensi = Absensi::with('kehadiran.user')->findOrFail($id);
        return view('absensi.detail', compact('absensi'));
    }
}
