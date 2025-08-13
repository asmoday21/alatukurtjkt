<form action="{{ route('kuis.store') }}" method="POST">
    @csrf
    <input type="text" name="judul" placeholder="Judul Kuis" class="w-full p-2 border rounded mb-2">
    <textarea name="deskripsi" rows="3" placeholder="Deskripsi" class="w-full p-2 border rounded mb-2"></textarea>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Kuis</button>
</form>
