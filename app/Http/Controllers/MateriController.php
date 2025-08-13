<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\User;
use App\Models\Paragraf;
use App\Notifications\MateriBaruNotification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // pakai GD driver

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with(['user', 'paragraf'])->latest()->get();

        return auth()->user()->hasRole('siswa')
            ? view('materi.index_siswa', compact('materi'))
            : view('materi.index', compact('materi'));
    }

    public function showSiswa($id)
    {
        $materi = Materi::with('paragraf')->findOrFail($id);
        return view('materi.show_siswa', compact('materi'));
    }

    public function show($id)
    {
        $materi = Materi::with(['user', 'paragraf', 'komentars.user'])->findOrFail($id);

        return auth()->user()->hasRole('siswa')
            ? view('materi.show_siswa', compact('materi'))
            : view('materi.show', compact('materi'));
    }

    public function create()
    {
        $this->authorizeGuru();
        return view('materi.create');
    }

    public function store(Request $request)
    {
        $this->authorizeGuru();

        $request->validate([
            'judul'            => 'required|string|max:255',
            'deskripsi'        => 'nullable|string',
            'icon'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'paragraf'         => 'required|array|min:1',
            'paragraf.*.teks'  => 'nullable|string|required_without_all:paragraf.*.gambar,paragraf.*.video',
            'paragraf.*.video' => 'nullable|url|required_without_all:paragraf.*.teks,paragraf.*.gambar',
            'paragraf.*.gambar'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required_without_all:paragraf.*.teks,paragraf.*.video',
            'poin_penting'     => 'nullable|string',
            'kesimpulan'       => 'nullable|string',
        ]);

        // Simpan icon jika ada upload
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $this->processImage($request->file('icon'), 'icons', 100, 100);
        }

        // Simpan materi ke database, pastikan icon ikut disimpan (bisa null)
        $materi = Materi::create([
            'judul'        => $request->judul,
            'deskripsi'    => $request->deskripsi,
            'icon'         => $iconPath,
            'poin_penting' => $request->poin_penting,
            'kesimpulan'   => $request->kesimpulan,
            'user_id'      => auth()->id(),
        ]);

        // Simpan paragraf
        foreach ($request->paragraf as $p) {
            $gambarPath = null;
            if (isset($p['gambar']) && $p['gambar'] instanceof \Illuminate\Http\UploadedFile) {
                $gambarPath = $this->processImage($p['gambar'], 'materi_gambar', 800, null);
            }

            Paragraf::create([
                'materi_id' => $materi->id,
                'teks'      => $p['teks'] ?? null,
                'video'     => $p['video'] ?? null,
                'gambar'    => $gambarPath,
            ]);
        }

        // Kirim notifikasi ke siswa
        User::role('siswa')->get()->each(function ($siswa) use ($materi) {
            $siswa->notify(new MateriBaruNotification($materi));
        });

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dibuat dan notifikasi dikirim.');
    }

    public function edit($id)
    {
        $materi = Materi::with('paragraf')->findOrFail($id);
        $this->authorizeGuruOwner($materi);
        return view('materi.edit', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::with('paragraf')->findOrFail($id);
        $this->authorizeGuruOwner($materi);

        $request->validate([
            'judul'             => 'required|string|max:255',
            'deskripsi'         => 'nullable|string',
            'icon'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'paragraf'          => 'required|array|min:1',
            'paragraf.*.teks'   => 'nullable|string|required_without_all:paragraf.*.gambar,paragraf.*.video',
            'paragraf.*.video'  => 'nullable|url|required_without_all:paragraf.*.teks,paragraf.*.gambar',
            'paragraf.*.gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'poin_penting'      => 'nullable|string',
            'kesimpulan'        => 'nullable|string',
        ]);

        $updateData = [
            'judul'        => $request->judul,
            'deskripsi'    => $request->deskripsi,
            'poin_penting' => $request->poin_penting,
            'kesimpulan'   => $request->kesimpulan,
        ];

        // Update icon jika ada upload baru
        if ($request->hasFile('icon')) {
            $this->deleteFileIfExists($materi->icon);
            $updateData['icon'] = $this->processImage($request->file('icon'), 'icons', 100, 100);
        }

        $materi->update($updateData);

        // Hapus paragraf lama
        foreach ($materi->paragraf as $paragraf) {
            $this->deleteFileIfExists($paragraf->gambar);
            $paragraf->delete();
        }

        // Simpan paragraf baru
        foreach ($request->paragraf as $p) {
            $gambarPath = null;
            if (isset($p['gambar']) && $p['gambar'] instanceof \Illuminate\Http\UploadedFile) {
                $gambarPath = $this->processImage($p['gambar'], 'materi_gambar', 800, null);
            }

            Paragraf::create([
                'materi_id' => $materi->id,
                'teks'      => $p['teks'] ?? null,
                'video'     => $p['video'] ?? null,
                'gambar'    => $gambarPath,
            ]);
        }

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $materi = Materi::with('paragraf')->findOrFail($id);
        $this->authorizeGuruOwner($materi);

        $this->deleteFileIfExists($materi->icon);

        foreach ($materi->paragraf as $paragraf) {
            $this->deleteFileIfExists($paragraf->gambar);
        }

        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }

    protected function authorizeGuru()
    {
        if (!auth()->user()->hasRole('guru')) {
            abort(403, 'Hanya guru yang boleh mengakses halaman ini.');
        }
    }

    protected function authorizeGuruOwner(Materi $materi)
    {
        if (!auth()->user()->hasRole('guru') || auth()->id() !== $materi->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses materi ini.');
        }
    }

    /**
     * Proses upload & resize gambar.
     */
    protected function processImage($file, $folder, $width = null, $height = null)
    {
        if (!$file || !$file instanceof \Illuminate\Http\UploadedFile) {
            return null;
        }

        // Pakai ImageManager langsung
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);

        if ($width || $height) {
            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $fileName = uniqid($folder . '_') . '.' . $file->getClientOriginalExtension();
        $path = $folder . '/' . $fileName;

        Storage::disk('public')->put($path, (string) $image->encode());

        return $path;
    }

    /**
     * Hapus file jika ada di storage.
     */
    protected function deleteFileIfExists($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
