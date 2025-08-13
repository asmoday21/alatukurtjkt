<form action="{{ route('tugas.store') }}" method="POST">
    @csrf
    <input type="text" name="judul" placeholder="Judul Tugas" class="w-full p-2 border rounded mb-2">
    <textarea name="deskripsi" rows="3" placeholder="Deskripsi Tugas" class="w-full p-2 border rounded mb-2"></textarea>
    <button class="bg-yellow-600 text-white px-4 py-2 rounded">Simpan Tugas</button>
</form>
