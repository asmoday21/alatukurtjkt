<form action="{{ route('absensi.store') }}" method="POST">
    @csrf
    <input type="date" name="tanggal" class="w-full p-2 border rounded mb-2">
    <input type="text" name="nama_sesi" placeholder="Sesi" class="w-full p-2 border rounded mb-2">
    <button class="bg-teal-600 text-white px-4 py-2 rounded">Simpan Absensi</button>
</form>
