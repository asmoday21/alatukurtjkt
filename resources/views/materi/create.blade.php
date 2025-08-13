@extends('layouts.guru')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
    <h2 class="text-2xl font-bold text-indigo-700 mb-4 flex items-center gap-2">
        <i class="fas fa-upload"></i> Buat Materi Baru
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

    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data" id="materiForm">
        @csrf

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">📘 Judul Materi</label>
            <input type="text" name="judul" class="border p-2 w-full rounded" required value="{{ old('judul') }}">
        </div>

      {{-- Icon Materi (Gambar) --}}
<div class="mb-4">
    <label class="block font-semibold mb-1">🖼️ Icon Materi</label>
    <input type="file" name="icon" id="iconInput" accept="image/*" class="border p-2 w-full rounded">
    <p class="text-sm text-gray-500 mt-1">Maksimal 2MB, disarankan ukuran 100x100px.</p>

    {{-- Preview --}}
    <div id="iconPreviewWrapper" class="mt-2 hidden">
        <p class="text-xs text-gray-500 mb-1">Preview:</p>
        <img id="iconPreview" src="" alt="Preview Icon" class="h-16 w-16 object-cover rounded border">
        <p id="iconSizeInfo" class="text-xs text-gray-500 mt-1"></p>
    </div>
</div>

<script>
document.getElementById('iconInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    // Tampilkan preview
    const reader = new FileReader();
    reader.onload = function(event) {
        document.getElementById('iconPreview').src = event.target.result;
        document.getElementById('iconPreviewWrapper').classList.remove('hidden');
    };
    reader.readAsDataURL(file);

    // Info ukuran file
    const sizeKB = (file.size / 1024).toFixed(2);
    document.getElementById('iconSizeInfo').textContent = `Ukuran: ${sizeKB} KB`;
    
    // Validasi ukuran (2MB = 2048KB)
    if (file.size > 2 * 1024 * 1024) {
        alert("⚠️ Ukuran icon melebihi 2MB. Silakan pilih gambar yang lebih kecil.");
        e.target.value = ""; // reset input
        document.getElementById('iconPreviewWrapper').classList.add('hidden');
    }
});
</script>


        {{-- Deskripsi --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">📝 Deskripsi Singkat</label>
            <textarea name="deskripsi" class="border p-2 w-full rounded" rows="3" placeholder="Tuliskan deskripsi singkat...">{{ old('deskripsi') }}</textarea>
        </div>

        {{-- Kontainer Dinamis --}}
        <div id="paragrafContainer" class="mb-4">
            <label class="block font-semibold mb-2">📄 Konten Materi</label>
            @if(old('paragraf'))
                @foreach(old('paragraf') as $i => $p)
                <div class="paragraf-item border p-3 rounded mb-3 bg-gray-50">
                    <textarea name="paragraf[{{ $i }}][teks]" class="border p-2 w-full rounded mb-2" rows="2">{{ $p['teks'] ?? '' }}</textarea>
                    <input type="file" name="paragraf[{{ $i }}][gambar]" accept="image/*" class="border p-2 w-full rounded mb-2" />
                    <input type="url" name="paragraf[{{ $i }}][video]" class="border p-2 w-full rounded" value="{{ $p['video'] ?? '' }}">
                </div>
                @endforeach
            @endif
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
            <textarea name="poin_penting" class="border p-2 w-full rounded" rows="4">{{ old('poin_penting') }}</textarea>
        </div>

        {{-- Kesimpulan --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">✅ Kesimpulan</label>
            <textarea name="kesimpulan" class="border p-2 w-full rounded" rows="3">{{ old('kesimpulan') }}</textarea>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded shadow flex items-center gap-2">
                <i class="fas fa-save"></i> Simpan Materi
            </button>
        </div>
    </form>
</div>

<script>
    let paragrafIndex = {{ old('paragraf') ? count(old('paragraf')) : 0 }};

    function buatItemHTML(type) {
        let html = `<div class="paragraf-item border p-3 rounded mb-3 bg-gray-50">`;
        html += `<textarea name="paragraf[${paragrafIndex}][teks]" class="border p-2 w-full rounded mb-2" rows="2"></textarea>`;
        if (type === 'image') {
            html += `<input type="file" name="paragraf[${paragrafIndex}][gambar]" accept="image/*" class="border p-2 w-full rounded mb-2">`;
        }
        if (type === 'video') {
            html += `<input type="url" name="paragraf[${paragrafIndex}][video]" class="border p-2 w-full rounded">`;
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
</script>
@endsection
