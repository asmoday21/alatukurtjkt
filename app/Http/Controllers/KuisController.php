<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kuis;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;
use App\Models\AktivitasSiswa;
use App\Notifications\KuisBaruNotification;

class KuisController extends Controller
{
    /**
     * Tampilkan semua kuis
     */
  public function index(Request $request)
{
    $filterKuis = $request->filter_kuis;
    $filterHasil = $request->filter_hasil;

    $kuis = Kuis::with('user')
        ->when($filterKuis, fn($q) => $q->where('judul', $filterKuis))
        ->latest()
        ->get();

    $jawabanQuery = Jawaban::with(['user', 'pertanyaan.kuis']);

    if ($filterHasil) {
        $jawabanQuery->whereHas('pertanyaan.kuis', function ($q) use ($filterHasil) {
            $q->where('judul', $filterHasil);
        });
    }

    $hasilKuis = $jawabanQuery->get()
        ->groupBy(fn($item) => $item->user_id . '-' . $item->pertanyaan->kuis_id);

    return view('kuis.index', compact('kuis', 'hasilKuis'));
}


    public function hasil($id)
{
    $kuis = Kuis::with(['pertanyaans', 'jawabans.user'])->findOrFail($id);
    return view('kuis.hasil-siswa', compact('kuis'));
}


    /**
     * Tampilkan form membuat kuis (hanya untuk guru)
     */
    public function create()
    {
        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }
        return view('kuis.create');
    }

    /**
     * Simpan kuis baru dan pertanyaan-pertanyaannya
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'pertanyaan.*.soal' => 'required',
            'pertanyaan.*.opsi_a' => 'required',
            'pertanyaan.*.opsi_b' => 'required',
            'pertanyaan.*.opsi_c' => 'required',
            'pertanyaan.*.opsi_d' => 'required',
            'pertanyaan.*.kunci_jawaban' => 'required|in:A,B,C,D',
        ]);

        $kuis = Kuis::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::id(),
        ]);

        foreach ($request->pertanyaan as $item) {
            Pertanyaan::create([
                'kuis_id' => $kuis->id,
                'soal' => $item['soal'],
                'opsi_a' => $item['opsi_a'],
                'opsi_b' => $item['opsi_b'],
                'opsi_c' => $item['opsi_c'],
                'opsi_d' => $item['opsi_d'],
                'kunci_jawaban' => $item['kunci_jawaban'],
            ]);
        }

        // 🔔 Kirim notifikasi ke semua siswa
        User::role('siswa')->get()->each(function ($siswa) use ($kuis) {
            $siswa->notify(new KuisBaruNotification($kuis));
        });

        return redirect()->route('kuis.index')->with('success', 'Kuis berhasil dibuat dan notifikasi dikirim!');
    }

    public function destroy($id)
{
    $kuis = Kuis::findOrFail($id);
    $kuis->delete();

    return redirect()->route('kuis.index')->with('success', 'Kuis berhasil dihapus.');
}


// buat edit kuis
// Menampilkan form edit kuis
public function edit($id)
{
    $kuis = Kuis::with('pertanyaans')->findOrFail($id); // Ganti dengan 'pertanyaans'
    return view('kuis.edit', compact('kuis'));
}

public function update(Request $request, $id)
{
    $kuis = Kuis::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'pertanyaans' => 'required|array',
    ]);

    $kuis->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ]);

    // Update semua soal yang sudah ada
    foreach ($request->pertanyaans as $i => $data) {
        $soal = \App\Models\Pertanyaan::find($data['id']);
        if ($soal) {
            $soal->update([
                'soal' => $data['soal'],
                'opsi_a' => $data['opsi_a'],
                'opsi_b' => $data['opsi_b'],
                'opsi_c' => $data['opsi_c'],
                'opsi_d' => $data['opsi_d'],
                'kunci_jawaban' => $data['kunci_jawaban'],
            ]);
        }
    }

    return redirect()->route('kuis.index')->with('success', 'Kuis berhasil diperbarui.');
}





    /**
     * Tampilkan kuis dan pertanyaannya
     */
    public function show($id)
    {
        $kuis = Kuis::with('pertanyaans')->findOrFail($id);

        // ⏺️ Catat aktivitas siswa membuka kuis
        if (auth()->user()->hasRole('siswa')) {
            AktivitasSiswa::create([
                'user_id' => auth()->id(),
                'aksi' => 'Buka Kuis',
                'deskripsi' => 'Membuka kuis: ' . $kuis->judul,
            ]);
        }

        return view('kuis.show', compact('kuis'));
    }

    /**
     * Proses hasil jawaban siswa dan hitung skor
     */
    public function submit(Request $request, $id)
    {
        $kuis = Kuis::with('pertanyaans')->findOrFail($id);
        $jawabanUser = $request->jawaban;
        $benar = 0;

        foreach ($kuis->pertanyaans as $pertanyaan) {
            $pilihan = $jawabanUser[$pertanyaan->id] ?? null;
            $isBenar = $pilihan === $pertanyaan->kunci_jawaban;

            Jawaban::create([
                'pertanyaan_id' => $pertanyaan->id,
                'user_id' => Auth::id(),
                'jawaban_dipilih' => $pilihan,
                'benar' => $isBenar,
            ]);

            if ($isBenar) {
                $benar++;
            }
        }

        $total = $kuis->pertanyaans->count();
        $skor = round(($benar / $total) * 100);

        // ⏺️ Catat aktivitas menyelesaikan kuis
        AktivitasSiswa::create([
            'user_id' => auth()->id(),
            'aksi' => 'Kerjakan Kuis',
            'deskripsi' => 'Menyelesaikan kuis: ' . $kuis->judul,
        ]);

      return view('kuis.hasil', [
    'kuis' => $kuis,
    'skor' => $skor,
    'jawabanUser' => $jawabanUser
]);

    }

  public function createLink()
{
    return view('kuis.create-link');
}

public function storeLink(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'link' => 'required|url'
    ]);

    Kuis::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link' => $request->link,
        'user_id' => auth()->id()
    ]);

    return redirect()->route('kuis.index')->with('success', 'Link kuis berhasil ditambahkan.');
}

public function editLink($id)
{
    $kuis = Kuis::findOrFail($id);
    
    // Pastikan ini kuis link eksternal
    if (!$kuis->link) {
        return redirect()->route('kuis.index')->with('error', 'Kuis ini bukan link eksternal.');
    }
    
    return view('kuis.edit-link', compact('kuis'));
}

public function updateLink(Request $request, $id)
{
    $kuis = Kuis::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string|max:1000',
        'link' => 'required|url|max:1000',
    ]);

    $kuis->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link' => $request->link,
    ]);

    return redirect()->route('kuis.index')->with('success', 'Link game kuis berhasil diperbarui.');
}


    
}
