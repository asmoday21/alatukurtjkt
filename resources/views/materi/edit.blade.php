@extends('layouts.guru')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
    <h2 class="text-2xl font-bold text-indigo-700 mb-4 flex items-center gap-2">
        <i class="fas fa-edit"></i> Edit Materi
    </h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded border border-green-300">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded border border-red-300">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data" id="materiForm">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">📘 Judul Materi</label>
            <input type="text" name="judul" class="border p-2 w-full rounded" required value="{{ old('judul', $materi->judul) }}">
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">📝 Deskripsi Singkat</label>
            <textarea name="deskripsi" class="border p-2 w-full rounded" rows="3">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
        </div>

        {{-- Icon Materi --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">🖼️ Icon Materi (opsional)</label>
            @if(!empty($materi->icon))
                <img id="iconPreview" src="{{ asset('storage/' . $materi->icon) }}" alt="Icon Materi" class="w-24 h-24 object-cover rounded mb-2 border">
            @else
                <img id="iconPreview" src="#" alt="Preview Icon" class="hidden w-24 h-24 object-cover rounded mb-2 border">
            @endif
            <input type="file" name="icon" accept="image/*" id="iconInput" class="border p-2 w-full rounded" />
            <small class="text-gray-500">Kosongkan jika tidak ingin mengubah icon.</small>
        </div>

        {{-- Kontainer Dinamis --}}
        <div id="paragrafContainer" class="mb-4">
            <label class="block font-semibold mb-2">📄 Konten Materi</label>
            @foreach(old('paragraf', $materi->paragraf->toArray()) as $i => $p)
            <div class="paragraf-item border p-3 rounded mb-3 bg-gray-50">
                <textarea name="paragraf[{{ $i }}][teks]" class="border p-2 w-full rounded mb-2" rows="2">{{ $p['teks'] ?? '' }}</textarea>

                {{-- Gambar --}}
                @if (!empty($p['gambar']))
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $p['gambar']) }}" alt="Gambar Materi" class="max-h-40 mb-2 border">
                    </div>
                @endif
                <input type="file" name="paragraf[{{ $i }}][gambar]" accept="image/*" class="border p-2 w-full rounded mb-2" />

                {{-- Video --}}
                <input type="url" name="paragraf[{{ $i }}][video]" class="border p-2 w-full rounded" placeholder="Link Video" value="{{ $p['video'] ?? '' }}">
            </div>
            @endforeach
        </div>

        {{-- Tombol Tambah --}}
        <div class="flex gap-2 mb-4">
            <button type="button" id="tambahParagraf" class="bg-green-500 text-white px-3 py-1 rounded shadow">
                ➕ Tambah Paragraf
            </button>
            <button type="button" id="tambahFoto" class="bg-blue-500 text-white px-3 py-1 rounded shadow">
                🖼️ Tambah Foto
            </button>
            <button type="button" id="tambahVideo" class="bg-purple-500 text-white px-3 py-1 rounded shadow">
                🎥 Tambah Video
            </button>
        </div>

        {{-- Poin-poin penting --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">📌 Poin-Poin Penting</label>
            <textarea name="poin_penting" class="border p-2 w-full rounded" rows="4">{{ old('poin_penting', $materi->poin_penting) }}</textarea>
        </div>

        {{-- Kesimpulan --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">✅ Kesimpulan</label>
            <textarea name="kesimpulan" class="border p-2 w-full rounded" rows="3">{{ old('kesimpulan', $materi->kesimpulan) }}</textarea>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded shadow flex items-center gap-2">
                <i class="fas fa-save"></i> Update Materi
            </button>
        </div>
    </form>
</div>

<script>
    let paragrafIndex = {{ old('paragraf') ? count(old('paragraf')) : $materi->paragraf->count() }};

    function buatItemHTML(type) {
        let html = `<div class="paragraf-item border p-3 rounded mb-3 bg-gray-50">`;
        html += `<textarea name="paragraf[${paragrafIndex}][teks]" class="border p-2 w-full rounded mb-2" rows="2"></textarea>`;
        if (type === 'image') {
            html += `<input type="file" name="paragraf[${paragrafIndex}][gambar]" accept="image/*" class="border p-2 w-full rounded mb-2">`;
        }
        if (type === 'video') {
            html += `<input type="url" name="paragraf[${paragrafIndex}][video]" class="border p-2 w-full rounded" placeholder="Link Video">`;
        }
        html += `</div>`;
        paragrafIndex++;
        return html;
    }

    document.getElementById('tambahParagraf').addEventListener('click', function () {
        document.getElementById('paragrafContainer').insertAdjacentHTML('beforeend', buatItemHTML('text'));
    });

    document.getElementById('tambahFoto').addEventListener('click', function () {
        document.getElementById('paragrafContainer').insertAdjacentHTML('beforeend', buatItemHTML('image'));
    });

    document.getElementById('tambahVideo').addEventListener('click', function () {
        document.getElementById('paragrafContainer').insertAdjacentHTML('beforeend', buatItemHTML('video'));
    });

    // Preview icon saat upload
    const iconInput = document.getElementById('iconInput');
    const iconPreview = document.getElementById('iconPreview');

    iconInput.addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            iconPreview.src = URL.createObjectURL(file);
            iconPreview.classList.remove('hidden');
        }
    });
</script>
@endsection
