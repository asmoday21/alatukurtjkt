@php
    $layout = auth()->user()->hasRole('guru') ? 'layouts.guru' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-6 text-indigo-700 flex items-center gap-2">
        <i class="fas fa-link text-green-500"></i> Edit Link Game Kuis
    </h2>

    <form action="{{ route('kuis.update-link', $kuis->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div>
            <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul Kuis</label>
            <input 
                type="text" 
                name="judul" 
                id="judul" 
                value="{{ old('judul', $kuis->judul) }}" 
                required 
                placeholder="Judul Kuis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi (opsional)</label>
            <textarea 
                name="deskripsi" 
                id="deskripsi" 
                rows="3"
                placeholder="Deskripsi singkat tentang kuis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >{{ old('deskripsi', $kuis->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- URL Link --}}
        <div>
            <label for="link" class="block text-gray-700 font-semibold mb-2">URL Link Kuis</label>
            <input 
                type="url" 
                name="link" 
                id="link" 
                value="{{ old('link', $kuis->link) }}" 
                required 
                placeholder="https://example.com/game-kuis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
            >
            @error('link')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol aksi --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('kuis.index') }}" class="text-gray-600 hover:underline">&larr; Kembali</a>
            <button type="submit" 
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
