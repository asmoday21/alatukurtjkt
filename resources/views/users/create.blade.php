@extends('layouts.guru')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8 animate__animated animate__fadeIn">
    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-indigo-700 flex items-center gap-3">
            <i class="fas fa-user-plus text-indigo-500 animate-pulse"></i> Tambah Pengguna Baru
        </h2>
        <p class="text-sm text-gray-500">Isi informasi pengguna baru dengan lengkap dan benar.</p>
    </div>

    {{-- Flash Success --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-800 border border-green-300 p-3 rounded-lg shadow-sm">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Error Global --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
            <ul class="list-disc pl-5 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle mr-1"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-3xl shadow-xl p-6 space-y-6">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">👤 Nama Lengkap</label>
                <input type="text" name="name" id="name" autofocus
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       placeholder="Contoh: Budi Santoso" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">📧 Email</label>
                <input type="email" name="email" id="email"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       placeholder="nama@email.com" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">🔐 Password</label>
                <input type="password" name="password" id="password" minlength="6"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       placeholder="Minimal 6 karakter" required>
                @error('password')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            {{-- Role --}}
            <div>
                <label for="role" class="block text-sm font-semibold text-gray-700 mb-1">🛡️ Role</label>
                <select name="role" id="role"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="siswa" {{ old('role') === 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="guru" {{ old('role') === 'guru' ? 'selected' : '' }}>Guru</option>
                </select>
                @error('role')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="pt-4">
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-md transition">
                    <i class="fas fa-save animate__animated animate__fadeInUp"></i> Simpan User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
