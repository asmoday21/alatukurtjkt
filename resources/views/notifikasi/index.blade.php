@extends('layouts.app')

@section('content')
<style>
    .shake {
        animation: shake 0.4s ease-in-out infinite alternate;
    }

    @keyframes shake {
        0% { transform: rotate(-5deg); }
        100% { transform: rotate(5deg); }
    }
</style>

<div class="max-w-6xl mx-auto py-10 px-4">

    {{-- Header --}}
    <div class="flex justify-between items-center flex-wrap mb-6">
        <h2 class="text-3xl font-bold text-indigo-700 flex items-center gap-3">
            @if ($notifikasi->count())
                <span class="relative inline-block">
                    <i class="fas fa-bell text-indigo-600 text-3xl shake"></i>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full animate-bounce">
                        {{ $notifikasi->count() }}
                    </span>
                </span>
            @else
                <i class="fas fa-bell-slash text-gray-400 text-3xl"></i>
            @endif
            Semua Notifikasi
        </h2>
<!-- 
        @if ($notifikasi->count())
            <button onclick="scrollToLatest()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow-lg transition">
                ⬇️ Lihat Notifikasi Terbaru
            </button>
        @endif -->
    </div>

    {{-- Notifikasi --}}
    @if ($notifikasi->count())
        <div class="space-y-4">
            @foreach ($notifikasi->sortByDesc('created_at') as $key => $notif)
                <div id="{{ $loop->first ? 'latest' : '' }}"
                     class="bg-white border-l-4 border-indigo-500 rounded-xl shadow p-5 hover:shadow-md transition duration-300">
                    <div class="flex items-start gap-3">
                        <div class="text-indigo-500 text-xl">
                            <i class="fas fa-bell{{ $loop->first ? ' shake text-red-500' : '' }}"></i>
                        </div>
                        <div>
                            <p class="text-gray-800 font-medium">
                                {{ $notif->data['pesan'] ?? '[Pesan kosong]' }}
                            </p>
                            <span class="text-xs text-gray-500">{{ $notif->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-inbox text-5xl mb-3"></i>
            <p class="text-xl">Belum ada notifikasi.</p>
        </div>
    @endif
</div>

<script>
    function scrollToLatest() {
        const latest = document.getElementById("latest");
        if (latest) {
            latest.scrollIntoView({ behavior: "smooth" });
        }
    }
</script>
@endsection
