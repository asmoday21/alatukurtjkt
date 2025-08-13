<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MateriController,
    KomentarController,
    KuisController,
    TugasController,
    AbsensiController,
    RekapAbsensiController,
    ExportAbsensiController,
    AktivitasController,
    UserController,
    StatistikController,
    DashboardController,
    NotifikasiController,
    GameController,
    HomeController
};
use App\Models\{Tugas, Materi, Kuis, Absensi, User};

// Halaman notifikasi
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');

// Landing page
Route::get('/', function () {
    return view('welcome', [
        'materiCount' => Materi::count(),
        'kuisCount'   => Kuis::count(),
        'tugasCount'  => Tugas::count(),
        'absensiCount'=> Absensi::count(),
    ]);
});

// 🔐 Semua route yang butuh login
Route::middleware(['auth'])->group(function () {

    // Dashboard guru & siswa
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('guru')) {
            $tugasList   = Tugas::where('user_id', $user->id)->latest()->take(5)->get();
            $materiCount = Materi::where('user_id', $user->id)->count();
            $kuisCount   = Kuis::where('user_id', $user->id)->count();
            $tugasCount  = Tugas::where('user_id', $user->id)->count();
            $absensiCount= Absensi::where('user_id', $user->id)->count();
            $userCount   = User::count();

            try {
                $absensiToday = RekapAbsensiController::countHadirToday();
            } catch (\Throwable $e) {
                $absensiToday = null;
            }

            return view('dashboard.guru', compact(
                'tugasList', 'absensiToday', 'materiCount', 'kuisCount', 'tugasCount', 'absensiCount', 'userCount'
            ));
        }

        if ($user->hasRole('siswa')) {
            return view('dashboard.siswa');
        }

        abort(403);
    })->name('dashboard');

    // Dashboard khusus siswa
    Route::get('/dashboard/siswa', fn () => view('dashboard.siswa'))
        ->name('dashboard.siswa')
        ->middleware(['role:siswa']);

    Route::get('/dashboard-guru', [DashboardController::class, 'guru'])->name('dashboard.guru');

    // 📚 Materi
    Route::resource('materi', MateriController::class);
    Route::post('/materi/{id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    Route::get('/siswa/materi', [MateriController::class, 'indexSiswa'])->name('materi.index_siswa');
    Route::get('/siswa/materi/{id}', [MateriController::class, 'showSiswa'])->name('materi.show_siswa');

 Route::middleware(['auth'])->group(function () {
    Route::get('/kuis/create-link', [KuisController::class, 'createLink'])->name('kuis.create-link');
    Route::post('/kuis/store-link', [KuisController::class, 'storeLink'])->name('kuis.store-link');
    Route::get('/kuis/{id}/edit-link', [KuisController::class, 'editLink'])->name('kuis.edit-link');
Route::put('/kuis/{id}/update-link', [KuisController::class, 'updateLink'])->name('kuis.update-link');

});


    Route::get('/kuis/{id}/hasil', [KuisController::class, 'hasil'])->name('kuis.hasil')->middleware('role:guru');
    Route::post('/kuis/{id}/submit', [KuisController::class, 'submit'])->name('kuis.submit');
    Route::get('/kuis-siswa', [KuisController::class, 'index'])->name('kuis.index_siswa')->middleware('role:siswa');

    // Resource kuis (wajib setelah route khusus di atas)
    Route::resource('kuis', KuisController::class);

    // 📂 Tugas
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{id}', [TugasController::class, 'show'])->name('tugas.show');
    Route::post('/tugas/{id}/kumpulkan', [TugasController::class, 'kumpulkan'])->name('tugas.kumpulkan');
    Route::get('/tugas/{id}/penilaian', [TugasController::class, 'penilaian'])->name('tugas.penilaian');
    Route::post('/tugas/{id}/nilai', [TugasController::class, 'beriNilai'])->name('tugas.nilai');

    // 📅 Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/{id}/detail', [AbsensiController::class, 'detail'])->name('absensi.detail');
    Route::get('/absensi/hari-ini', [AbsensiController::class, 'hariIni'])->name('absensi.hari_ini');
    Route::post('/absensi/{id}/hadir', [AbsensiController::class, 'hadir'])->name('absensi.hadir');

    // 📊 Rekap absensi
    Route::get('/absensi/rekap', [RekapAbsensiController::class, 'index'])->name('absensi.rekap');
    Route::get('/absensi/{id}/siswa', [RekapAbsensiController::class, 'siswa'])->name('absensi.rekap.siswa');
    Route::get('/absensi/riwayat', [RekapAbsensiController::class, 'riwayatSiswa'])->name('absensi.riwayat');

    // 📤 Export absensi
    Route::get('/absensi/export/excel', [ExportAbsensiController::class, 'excel'])->name('absensi.export.excel');
    Route::get('/absensi/export/pdf', [ExportAbsensiController::class, 'pdf'])->name('absensi.export.pdf');

    // 🔔 Notifikasi (sudah ada index di atas, ini opsional)
    Route::get('/notifikasi', function () {
        $user = auth()->user();
        return view('notifikasi.index', [
            'notifikasi' => $user->notifications()->latest()->get(),
        ]);
    })->name('notifikasi.index');

    // 📈 Statistik
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');

    // 👥 User
    Route::resource('users', UserController::class);

    // 🎮 Games (hanya guru)
    Route::resource('games', GameController::class)->middleware('role:guru');

    // 🕵️ Aktivitas
    Route::get('/aktivitas', [AktivitasController::class, 'index'])->name('aktivitas.index');
});

// Registrasi siswa
Route::get('/register-siswa', [UserController::class, 'showSiswaRegisterForm'])->name('register.siswa.form');
Route::post('/register-siswa', [UserController::class, 'registerSiswa'])->name('register.siswa');

// Auth routes
require __DIR__ . '/auth.php';
