@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-3xl font-extrabold text-indigo-700 flex items-center gap-3">
            <i class="fas fa-calendar-alt text-indigo-500 animate-pulse"></i> Daftar Jadwal Absensi
        </h2>

        <a href="{{ route('absensi.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition">
            <i class="fas fa-plus-circle"></i> Tambah Jadwal Baru
        </a>
    </div>

    {{-- Tabel --}}
    <div class="bg-white shadow-md rounded-2xl overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-indigo-100 text-indigo-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3 text-left">📅 Tanggal</th>
                    <th class="px-6 py-3 text-left">⏰ Sesi</th>
                    <th class="px-6 py-3 text-left">⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-700">
                @forelse($absensi as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium">
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                {{ $item->nama_sesi }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('absensi.detail', $item->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-semibold transition">
                                <i class="fas fa-eye mr-1"></i> Lihat Kehadiran
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-6 italic">Belum ada jadwal absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
