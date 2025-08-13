@extends('layouts.guru')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h2 class="text-3xl font-bold text-indigo-800 flex items-center gap-2">
        <i class="fas fa-layer-group text-indigo-500"></i> Daftar Materi
    </h2>

    @role('guru')
        <a href="{{ route('materi.create') }}"
           class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md shadow transition">
            <i class="fas fa-plus mr-2"></i> Upload Materi
        </a>
    @endrole
</div>

{{-- Notifikasi sukses --}}
@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-200 px-4 py-2 rounded mb-6 shadow">
        ✅ {{ session('success') }}
    </div>
@endif

{{-- Daftar materi --}}
@if($materi->count() > 0)
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($materi as $m)
            <div class="flex flex-col bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition duration-300">
{{-- Icon Materi --}}
<div class="mb-3">
    @if(!empty($m->icon))
        <img src="{{ asset('storage/' . $m->icon) }}" 
             alt="Icon Materi" 
             class="w-12 h-12 object-cover rounded">
    @elseif(!empty(optional($m->kategori)->icon))
        <i class="{{ $m->kategori->icon }} text-4xl text-indigo-600"></i>
    @else
        <i class="fas fa-book text-4xl text-indigo-600"></i>
    @endif
</div>



                {{-- Judul Materi --}}
                <h3 class="text-xl font-semibold text-indigo-700 mb-2 leading-snug">
                    <a href="{{ route('materi.show', $m->id) }}" class="hover:underline">{{ $m->judul }}</a>
                </h3>

                {{-- Informasi --}}
                <div class="text-sm text-gray-600 space-y-1 mb-4">
                    <p>📅 {{ $m->created_at->translatedFormat('d F Y') }}</p>
                    <p>✍️ Oleh: {{ $m->user->name ?? '(Pengguna tidak ditemukan)' }}</p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex flex-col gap-2 text-sm mt-auto">
                    <a href="{{ route('materi.show', $m->id) }}"
                       class="text-blue-600 hover:underline flex items-center gap-1">
                        📖 Lihat Materi
                    </a>

                    @if($m->file_pdf)
                        <a href="{{ asset('storage/' . $m->file_pdf) }}" target="_blank"
                           class="text-green-600 hover:text-green-700 flex items-center gap-1">
                            📥 Unduh Materi
                        </a>
                    @endif

                    {{-- Aksi Guru --}}
                    @role('guru')
                        @if(auth()->id() === $m->user_id)
                            <div class="flex gap-2 mt-2">
                                <a href="{{ route('materi.edit', $m->id) }}"
                                   class="text-xs bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('materi.destroy', $m->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-xs bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endrole
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center text-gray-500 italic py-10">
        📭 Belum ada materi yang tersedia.
    </div>
@endif
@endsection
