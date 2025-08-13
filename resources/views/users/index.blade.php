@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-3xl font-extrabold text-indigo-700 flex items-center gap-2">
            <i class="fas fa-users-cog text-indigo-500 animate-pulse"></i> Manajemen User
        </h2>

        <a href="{{ route('users.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold px-5 py-3 rounded-xl shadow-lg transition">
            <i class="fas fa-user-plus"></i> Tambah User
        </a>
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 border border-green-300 rounded-xl shadow">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 border border-red-300 rounded-xl shadow">
            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-gray-800">
            <thead class="bg-indigo-100 text-indigo-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3 text-left">👤 Nama</th>
                    <th class="px-6 py-3 text-left">📧 Email</th>
                    <th class="px-6 py-3 text-left">🛡️ Role</th>
                    <th class="px-6 py-3 text-right">⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @php $role = $user->getRoleNames()->first(); @endphp
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold shadow-sm
                                {{ $role == 'guru' ? 'bg-blue-100 text-blue-700' :
                                   ($role == 'siswa' ? 'bg-yellow-100 text-yellow-700' :
                                   'bg-gray-100 text-gray-700') }}">
                                {{ ucfirst($role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="inline-block text-sm px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="inline"
                                  onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="inline-block text-sm px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
