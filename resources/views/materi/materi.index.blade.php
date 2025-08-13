@foreach($materi as $m)
    <div class="bg-white shadow-md rounded-lg p-5">
        <h3 class="text-lg font-semibold text-indigo-700 mb-2">
            <a href="{{ route('materi.show', $m->id) }}">{{ $m->judul }}</a>
        </h3>
        <p class="text-sm text-gray-500 mb-1">📅 {{ $m->created_at->translatedFormat('d F Y') }}</p>
        <p class="text-sm text-gray-500 mb-3">Kategori: {{ $m->kategori->nama ?? '-' }}</p>

        @if(auth()->id() == $m->user_id && auth()->user()->hasRole('guru'))
            <div class="flex gap-2 mt-3">
                <a href="{{ route('materi.edit', $m->id) }}" class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                    ✏️ Edit
                </a>
                <form action="{{ route('materi.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        @endif
    </div>
@endforeach
