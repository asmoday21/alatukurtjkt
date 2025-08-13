@extends('layouts.siswa')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <h2 class="text-3xl font-extrabold text-indigo-800 flex items-center gap-3">
            <i class="fas fa-tasks text-indigo-500 animate-bounce"></i> Daftar Tugas
        </h2>

        @role('guru')
        <a href="{{ route('tugas.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-200">
            <i class="fas fa-plus"></i> Tambah Tugas
        </a>
        @endrole
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-6 px-4 py-3 bg-emerald-100 text-emerald-800 border border-emerald-300 rounded-xl shadow">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Tidak ada tugas --}}
    @if ($tugas instanceof \Illuminate\Support\Collection && $tugas->isEmpty())
        <div class="text-center text-gray-500 italic">📭 Belum ada tugas yang tersedia.</div>
    @else
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($tugas as $item)
                @php
                    $pengumpulan = $item->pengumpulan->where('user_id', auth()->id())->first();
                @endphp

                <div class="bg-white border-l-8 {{ $pengumpulan && $pengumpulan->nilai !== null ? 'border-green-400' : 'border-yellow-400' }} rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 space-y-3">
                    <h3 class="text-xl font-bold text-indigo-800">
                        <i class="fas fa-file-alt mr-2 text-indigo-400"></i> {{ $item->judul }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        🗓️ Deadline: 
                        <strong class="text-gray-800">
                            {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d F Y') }}
                        </strong>
                    </p>

                    {{-- Role siswa --}}
                    @role('siswa')
                        @if ($pengumpulan)
                            <div class="space-y-1 text-sm">
                                <span class="inline-flex items-center bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-medium">
                                    ✅ Tugas Sudah Dikumpulkan
                                </span>

                                @if($pengumpulan->nilai !== null)
                                    <span class="block text-indigo-700 font-semibold">
                                        🎓 Nilai: {{ $pengumpulan->nilai }}
                                    </span>
                                    @if($pengumpulan->catatan)
                                        <span class="block italic text-gray-500">💬 {{ $pengumpulan->catatan }}</span>
                                    @endif
                                @else
                                    <span class="block text-yellow-600 font-medium">
                                        ⏳ Menunggu Penilaian
                                    </span>
                                @endif
                            </div>
                        @else
                            <a href="{{ route('tugas.show', $item->id) }}"
                               class="mt-3 inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-xl shadow transition">
                                <i class="fas fa-upload"></i> Kumpulkan Tugas
                            </a>
                        @endif
                    @endrole

                    {{-- Role guru --}}
                    @role('guru')
                        @php
                            $pengumpulanCount = $item->pengumpulan->count();
                            $sudahDinilai = $pengumpulanCount > 0 && $item->pengumpulan->every(fn($p) => $p->nilai !== null);
                        @endphp

                        <div class="flex flex-wrap items-center gap-2 mt-4">
                            <a href="{{ route('tugas.penilaian', $item->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-4 py-2 rounded-xl shadow transition flex items-center gap-2">
                                <i class="fas fa-check-circle"></i> Penilaian
                            </a>

                            @if ($pengumpulanCount === 0)
                                <span class="bg-gray-200 text-gray-600 text-xs px-3 py-1 rounded-full">
                                    📭 Belum ada pengumpulan
                                </span>
                            @elseif ($sudahDinilai)
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                                    ✅ Semua Sudah Dinilai
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full">
                                    ⏳ Belum Dinilai Semua
                                </span>
                            @endif
                        </div>
                    @endrole
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
