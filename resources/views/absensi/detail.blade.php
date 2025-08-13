@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-indigo-700 flex items-center gap-3">
                <i class="fas fa-user-check text-indigo-500 animate-pulse"></i>
                Kehadiran: {{ $absensi->nama_sesi }}
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                📅 {{ \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('d F Y') }}
            </p>
        </div>

        <div class="flex gap-3 mt-2 md:mt-0">
            <a href="{{ route('absensi.export.excel') }}"
               class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">
                <i class="fas fa-file-excel"></i> Excel
            </a>
            <a href="{{ route('absensi.export.pdf') }}"
               class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">
                <i class="fas fa-file-pdf"></i> PDF
            </a>
        </div>
    </div>

    {{-- Table Kehadiran --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
            <thead class="bg-gradient-to-r from-indigo-100 to-indigo-200 text-indigo-700 uppercase tracking-wide text-xs">
                <tr>
                    <th class="px-6 py-3">👤 Nama Siswa</th>
                    <th class="px-6 py-3">⏰ Waktu Hadir</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($absensi->kehadiran as $data)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $data->user->name }}</td>
                        <td class="px-6 py-4 text-green-600 font-medium">
                            {{ \Carbon\Carbon::parse($data->waktu_hadir)->translatedFormat('H:i:s - d F Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-6 text-center italic text-gray-500">
                            Belum ada yang hadir pada sesi ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-6">
        <a href="{{ route('absensi.index') }}"
           class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 text-sm font-medium transition">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Absensi
        </a>
    </div>
</div>
@endsection
