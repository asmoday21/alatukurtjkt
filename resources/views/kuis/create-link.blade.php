@extends(auth()->user()->hasRole('guru') ? 'layouts.guru' : 'layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah Link Kuis</h2>
    <form action="{{ route('kuis.store-link') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold">Link</label>
            <input type="url" name="link" class="w-full border rounded px-3 py-2" required>
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
