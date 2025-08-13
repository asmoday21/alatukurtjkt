<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\User;
use App\Models\PengumpulanTugas;
use App\Models\AktivitasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\TugasBaruNotification;
use App\Notifications\TugasDikumpulkanNotification;

class TugasController extends Controller
{
    // Tampilkan semua tugas
    public function index()
    {
        $tugas = Tugas::with('pengumpulan')->latest()->get();
        return view('tugas.index', compact('tugas'));
    }

    // Form tambah tugas (khusus guru)
    public function create()
    {
        $this->authorizeRole('guru');
        return view('tugas.create');
    }

    // Simpan tugas baru & kirim notifikasi
    public function store(Request $request)
    {
        $this->authorizeRole('guru');

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        $tugas = Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(),
        ]);

       // Kirim notifikasi ke semua siswa
User::role('siswa')->get()->each(function ($siswa) use ($tugas) {
    $siswa->notify(new TugasBaruNotification($tugas));

});


        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat dan notifikasi dikirim.');
    }

    // Detail tugas untuk siswa/guru
    public function show($id)
    {
        $tugas = Tugas::findOrFail($id);
        $pengumpulan = PengumpulanTugas::where('tugas_id', $id)
                            ->where('user_id', Auth::id())
                            ->first();

        if (auth()->user()->hasRole('siswa')) {
            AktivitasSiswa::create([
                'user_id' => auth()->id(),
                'aksi' => 'Buka Tugas',
                'deskripsi' => 'Melihat tugas: ' . $tugas->judul,
            ]);
        }

        return view('tugas.show', compact('tugas', 'pengumpulan'));
    }

    // Penilaian tugas (guru)
    public function penilaian($id)
    {
        $this->authorizeRole('guru');

        $tugas = Tugas::findOrFail($id);
        $pengumpulan = PengumpulanTugas::with('user')->where('tugas_id', $id)->get();

        return view('tugas.penilaian', compact('tugas', 'pengumpulan'));
    }

    // Simpan nilai & catatan
    public function beriNilai(Request $request, $id)
    {
        $this->authorizeRole('guru');

        foreach ($request->nilai as $uid => $nilai) {
            $data = PengumpulanTugas::where('tugas_id', $id)->where('user_id', $uid)->first();

            if ($data) {
                $data->update([
                    'nilai' => $nilai,
                    'catatan' => $request->catatan[$uid] ?? null,
                ]);
            }
        }

        return redirect()->route('tugas.index')->with('success', 'Nilai dan catatan berhasil disimpan.');
    }

    // Aksi siswa mengumpulkan tugas
    public function kumpulkan(Request $request, $id)
    {
        $this->authorizeRole('siswa');

        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpg,png|max:10240'
        ]);

        $tugas = Tugas::findOrFail($id);
        $file = $request->file('file')->store('tugas', 'public');

        $pengumpulan = PengumpulanTugas::updateOrCreate(
            ['tugas_id' => $id, 'user_id' => auth()->id()],
            ['file' => $file]
        );

        // Log aktivitas
        AktivitasSiswa::create([
            'user_id' => auth()->id(),
            'aksi' => 'Kumpul Tugas',
            'deskripsi' => 'Mengumpulkan tugas: ' . $tugas->judul,
        ]);

        // 🔔 Notifikasi ke guru
        if ($tugas->user && $tugas->user->hasRole('guru')) {
            $tugas->user->notify(new TugasDikumpulkanNotification($tugas, auth()->user()));
        }

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dikumpulkan.');
    }

    // Index siswa
    public function indexSiswa()
    {
        $tugas = Tugas::with('pengumpulan')->latest()->get();
        return view('tugas.index_siswa', compact('tugas'));
    }

    // Validasi role
    private function authorizeRole($role)
    {
        if (!Auth::user()->hasRole($role)) {
            abort(403, 'Akses ditolak.');
        }
    }
}
