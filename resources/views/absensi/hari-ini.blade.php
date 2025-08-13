@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    <div class="bg-white rounded-2xl shadow-xl p-8 space-y-6 animate-fade-in">

        {{-- Judul --}}
        <h2 class="text-2xl font-bold text-indigo-700 flex items-center gap-2">
            <i class="fas fa-calendar-check text-indigo-500 animate-pulse"></i> Absensi Hari Ini
        </h2>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow flex items-center gap-2 animate-bounce">
                <img src="https://cdn-icons-png.flaticon.com/512/1792/1792931.png" class="w-6 h-6" alt="check" />
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Absensi --}}
        @if ($absensi)
            <div class="space-y-2">
                <p class="text-lg text-gray-700">
                    🗓️ <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('d F Y') }}
                </p>
                <p class="text-lg text-gray-700">
                    ⏰ <strong>Nama Sesi:</strong> {{ $absensi->nama_sesi }}
                </p>
            </div>

            <form action="{{ route('absensi.hadir', $absensi->id) }}" method="POST" class="pt-6" id="form-hadir">
                @csrf
                <button type="submit"
                        id="btn-hadir"
                        class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl shadow transition">
                    <i class="fas fa-check-circle"></i> Klik Hadir
                </button>
            </form>
        @else
            <div class="text-gray-500 text-center italic py-8">
                📭 Belum ada jadwal absensi untuk hari ini.
            </div>
        @endif

    </div>
</div>

{{-- Style --}}
<style>
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

{{-- Script tombol hanya bisa 1 klik + pesan berhasil --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('form-hadir');
        const button = document.getElementById('btn-hadir');

        if (form && button) {
            form.addEventListener('submit', function () {
                button.disabled = true;
                button.classList.add('opacity-50', 'cursor-not-allowed');
                button.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Mengirim...`;

                // Tambahkan pesan berhasil manual (jika tanpa redirect)
                const msg = document.createElement('div');
                msg.className = 'mt-6 bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2';
                msg.innerHTML = `
                    <img src="https://cdn-icons-png.flaticon.com/512/4207/4207246.png" class="w-6 h-6" alt="done">
                    <span>Yeay! Kehadiran kamu sudah dicatat 🎉</span>
                `;
                form.parentElement.appendChild(msg);
            });
        }
    });
</script>
@endsection
