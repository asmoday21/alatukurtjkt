@php
    $layout = auth()->user()->hasRole('guru') ? 'layouts.guru' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Judul dan Aksi --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
        <h2 class="text-4xl font-bold text-indigo-700 flex items-center gap-3">
            <i class="fas fa-lightbulb text-yellow-400 text-2xl"></i> Daftar Kuis
        </h2>

        @role('guru')
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('kuis.create') }}"
                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow transition">
                <i class="fas fa-plus"></i> Buat Kuis Baru
            </a>

            {{-- Tombol Tambah Link --}}
            <a href="{{ route('kuis.create-link') }}"
                class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow transition">
                <i class="fas fa-link"></i> Tambah Link Kuis
            </a>
        </div>
        @endrole
    </div>

    {{-- Filter Judul Kuis --}}
    <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-6">
        <form method="GET" action="{{ route('kuis.index') }}" class="w-full sm:w-auto">
            <select name="filter_kuis" onchange="this.form.submit()"
                class="border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-500 w-full sm:w-72">
                <option value="">🔍 Filter berdasarkan judul kuis</option>
                @foreach ($kuis->pluck('judul')->unique() as $judul)
                    <option value="{{ $judul }}" {{ request('filter_kuis') == $judul ? 'selected' : '' }}>
                        {{ $judul }}
                    </option>
                @endforeach
            </select>
        </form>

        @if(request('filter_kuis'))
            <a href="{{ route('kuis.index', array_merge(request()->except('filter_kuis'), [])) }}"
                class="bg-red-100 hover:bg-red-200 text-red-600 text-sm px-4 py-2 rounded-lg shadow-sm">
                ❌ Reset Filter
            </a>
        @endif
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

{{-- Kartu Kuis --}}
@if($kuis->count() > 0)
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($kuis as $item)
            @php
                $isExternal = !empty($item->link);
            @endphp

            <div class="relative rounded-xl shadow-md hover:shadow-2xl p-6 transition duration-300 border
                {{ $isExternal ? 'bg-gradient-to-br from-green-50 to-green-100 border-green-400' : 'bg-white border-indigo-200' }}">
                
                {{-- Badge Eksternal --}}
                @if($isExternal)
                 <span class="absolute top-3 right-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
    🎮 Link Game Kuis
</span>

                @endif

                <h3 class="text-xl font-bold {{ $isExternal ? 'text-green-800' : 'text-indigo-800' }} truncate mb-1">
                    {{ $item->judul }}
                </h3>
                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($item->deskripsi, 100) }}</p>

                {{-- Link Eksternal Keren --}}
                @if ($isExternal)
                    <a href="{{ $item->link }}" target="_blank"
                        class="block mt-3 bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-lg text-center shadow-md transition">
                        🚀 Buka Kuis
                    </a>
                @endif

                {{-- Info --}}
                <div class="text-xs text-gray-500 mt-4">
                    <p>📅 {{ $item->created_at->translatedFormat('d M Y') }}</p>
                    @if ($item->user)
                        <p>👤 {{ $item->user->name }}</p>
                    @endif
                </div>

                {{-- Tombol Aksi --}}
                @role('siswa')
                    @if(!$isExternal)
                        <a href="{{ route('kuis.show', $item->id) }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1.5 rounded-lg shadow mt-3">
                            🚀 Mulai Kuis
                        </a>
                    @endif
                @endrole

               @role('guru')
    <div class="flex items-center gap-2 mt-4 flex-wrap">
  @if(!$isExternal)
            <a href="{{ route('kuis.show', $item->id) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded shadow">
                🔍 Lihat
            </a>
        @endif
        {{-- Tombol Edit --}}
        @if ($item->link)
            <a href="{{ route('kuis.edit-link', $item->id) }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs px-3 py-1.5 rounded shadow"
               title="Edit Link Game Kuis">
                ✏️ Edit Link
            </a>
        @else
            <a href="{{ route('kuis.edit', $item->id) }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs px-3 py-1.5 rounded shadow"
               title="Edit Kuis">
                ✏️ Edit
            </a>
        @endif

        {{-- Tombol Hapus --}}
        <form action="{{ route('kuis.destroy', $item->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus kuis ini?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded shadow"
                title="Hapus Kuis">
                🗑️ Hapus
            </button>
        </form>
    </div>
@endrole

            </div>
        @endforeach
    </div>
@else
    <div class="text-center text-gray-500 italic mt-10">
        📭 Belum ada kuis yang tersedia.
    </div>
@endif

    {{-- Hasil Kuis --}}
    @role('guru')
        <hr class="my-12">
        <h3 class="text-3xl font-bold text-indigo-800 mb-4 flex items-center gap-2">
            <i class="fas fa-clipboard-check text-green-500"></i> Hasil Kuis Siswa
        </h3>

        {{-- Filter Hasil --}}
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-4">
            <form method="GET" action="{{ route('kuis.index') }}" class="w-full sm:w-auto">
                <select name="filter_hasil" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-500 w-full sm:w-72">
                    <option value="">📋 Filter Hasil Berdasarkan Judul Kuis</option>
                    @foreach ($hasilKuis->flatten()->pluck('pertanyaan.kuis.judul')->unique() as $judul)
                        <option value="{{ $judul }}" {{ request('filter_hasil') == $judul ? 'selected' : '' }}>
                            {{ $judul }}
                        </option>
                    @endforeach
                </select>
            </form>

            @if(request('filter_hasil'))
                <a href="{{ route('kuis.index', array_merge(request()->except('filter_hasil'), [])) }}"
                    class="bg-red-100 hover:bg-red-200 text-red-600 text-sm px-4 py-2 rounded-lg shadow-sm">
                    ❌ Reset Filter
                </a>
            @endif
        </div>

        {{-- Tabel --}}
        @if($hasilKuis->count())
            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="min-w-full text-sm border border-gray-200 divide-y divide-gray-100">
                    <thead class="bg-indigo-50 text-indigo-700 font-semibold text-left">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Siswa</th>
                            <th class="px-4 py-3">Judul Kuis</th>
                            <th class="px-4 py-3">Total Soal</th>
                            <th class="px-4 py-3">Benar</th>
                            <th class="px-4 py-3">Skor</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($hasilKuis as $group)
                            @php
                                $first = $group->first();
                                $siswa = $first->user->name ?? '-';
                                $kuisTitle = $first->pertanyaan->kuis->judul ?? '-';
                                $total = $group->count();
                                $benar = $group->where('benar', true)->count();
                                $skor = round(($benar / $total) * 100);
                                $tanggal = $first->created_at->translatedFormat('d M Y');
                            @endphp
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $siswa }}</td>
                                <td class="px-4 py-3">{{ $kuisTitle }}</td>
                                <td class="px-4 py-3">{{ $total }}</td>
                                <td class="px-4 py-3 text-green-600 font-semibold">{{ $benar }}</td>
                                <td class="px-4 py-3 text-indigo-800 font-bold">{{ $skor }} / 100</td>
                                <td class="px-4 py-3 text-gray-500">{{ $tanggal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-gray-500 italic mt-4">
                📭 Belum ada siswa yang menyelesaikan kuis.
            </div>
        @endif
    @endrole

</div>
@endsection
