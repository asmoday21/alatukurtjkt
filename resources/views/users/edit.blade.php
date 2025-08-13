@extends('layouts.guru')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-indigo-700 flex items-center gap-3">
            <i class="fas fa-user-edit text-indigo-500"></i> Edit Pengguna
        </h2>
        <p class="text-sm text-gray-500">Perbarui informasi pengguna dengan benar.</p>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-3xl shadow-xl p-6 space-y-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">👤 Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       required>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">📧 Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                       required>
            </div>

            {{-- Role --}}
            <div>
                <label for="role" class="block text-sm font-semibold text-gray-700 mb-1">🛡️ Peran (Role)</label>
                <select name="role" id="role"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    <option value="siswa" {{ $user->hasRole('siswa') ? 'selected' : '' }}>Siswa</option>
                    <option value="guru" {{ $user->hasRole('guru') ? 'selected' : '' }}>Guru</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="pt-4">
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl shadow-md transition">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
