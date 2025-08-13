@extends('layouts.siswa')

@section('title', 'Kuis Siswa')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <h2 class="text-3xl font-bold text-indigo-800 mb-6 flex items-center gap-3">
        <i class="fas fa-lightbulb text-yellow-400 text-2xl"></i> Daftar Kuis Tersedia
    </h2>

    @if($kuis->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($kuis as $item)
                <div class="bg-white border-l-4 border-indigo-600 rounded-xl shadow-md hover:shadow-lg p-6 transition duration-300">
                    <h3 class="text-xl font-semibold text-indigo-700 truncate mb-2">
                        <a href="{{ route('siswa.kuis.show', $item->id) }}" class="hover:underline">
                            {{ $item->judul }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($item->deskripsi, 100) }}</p>

                    <div class="text-xs text-gray-500 mb-4">
                        📅 {{ $item->created_at->translatedFormat('d M Y') }} <br>
                        👤 {{ $item->user->name ?? 'Guru' }}
                    </div>

                    <a href="{{ route('siswa.kuis.show', $item->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow inline-flex items-center gap-2">
                        🚀 Mulai Kuis
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500 italic mt-10">
            📭 Belum ada kuis yang tersedia saat ini.
        </div>
    @endif

</div>
@endsection
