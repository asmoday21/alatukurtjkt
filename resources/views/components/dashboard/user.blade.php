<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama" class="w-full p-2 border rounded mb-2">
    <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded mb-2">
    <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded mb-2">
    <select name="role" class="w-full p-2 border rounded mb-2">
        <option value="siswa">Siswa</option>
        <option value="guru">Guru</option>
    </select>
    <button class="bg-gray-800 text-white px-4 py-2 rounded">Tambah User</button>
</form>
