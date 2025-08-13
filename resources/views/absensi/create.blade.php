@extends('layouts.guru')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-indigo-700 flex items-center gap-2">
            <i class="fas fa-calendar-plus text-indigo-500 animate-pulse"></i> Buat Jadwal Absensi
        </h2>
        <p class="text-gray-500 text-sm">Silakan isi data sesi dan tanggal absensi dengan benar.</p>
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 border border-green-300 rounded-xl shadow">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 space-y-6">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            {{-- Nama Sesi --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">📝 Nama Sesi</label>
                <input type="text" name="nama_sesi"
                       value="{{ old('nama_sesi') }}"
                       class="w-full border @error('nama_sesi') border-red-500 @else border-gray-300 @enderror px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       placeholder="Contoh: Sesi 1 - Pagi" required>
                @error('nama_sesi')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div>
                <label class="block mt-4 mb-1 font-semibold text-gray-700">📅 Tanggal Absensi</label>
                <input type="date" name="tanggal"
                       value="{{ old('tanggal') }}"
                       class="w-full border @error('tanggal') border-red-500 @else border-gray-300 @enderror px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       required>
                @error('tanggal')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="mt-6">
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-md transition">
                    <i class="fas fa-save"></i> Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
