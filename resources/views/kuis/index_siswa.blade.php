@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    {{-- Judul --}}
    <div class="mb-8">
        <h2 class="text-4xl font-bold text-indigo-700 flex items-center gap-3">
            <i class="fas fa-lightbulb text-yellow-400 text-2xl"></i> Daftar Kuis
        </h2>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Kartu Kuis --}}
    @if($kuis->count() > 0)
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($kuis as $item)
                <div class="bg-white rounded-xl border-t-4 border-indigo-600 shadow-md hover:shadow-lg p-6 transition duration-300">
                    <h3 class="text-xl font-bold text-indigo-800 truncate mb-1">
                        <a href="{{ route('kuis.show', $item->id) }}" class="hover:underline">
                            {{ $item->judul }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($item->deskripsi, 100) }}</p>

                    <div class="text-xs text-gray-500 mb-4">
                        <p>📅 {{ $item->created_at->translatedFormat('d M Y') }}</p>
                        @if ($item->user)
                            <p>👤 {{ $item->user->name }}</p>
                        @endif
                    </div>

                    <a href="{{ route('kuis.show', $item->id) }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1.5 rounded-lg shadow transition">
                        🚀 Mulai Kuis
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500 italic mt-10">
            📭 Belum ada kuis yang tersedia.
        </div>
    @endif
</div>
@endsection
