<form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="judul" placeholder="Judul Materi" class="w-full p-2 border rounded mb-2">
    <textarea name="konten" rows="4" placeholder="Konten Materi" class="w-full p-2 border rounded mb-2"></textarea>
    <input type="file" name="file" class="mb-2">
    <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan Materi</button>
</form>
