@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="mb-8 flex justify-between items-center">
        <h2 class="text-3xl font-bold text-indigo-700 flex items-center gap-3">
            <i class="fas fa-history animate-pulse text-indigo-500"></i> Riwayat Aktivitas Siswa
        </h2>
    </div>

    {{-- Table --}}
    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                <thead class="bg-gradient-to-r from-indigo-100 to-indigo-200 text-indigo-800 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-4 text-left">👤 Nama Siswa</th>
                        <th class="px-6 py-4">📝 Aksi</th>
                        <th class="px-6 py-4">📄 Deskripsi</th>
                        <th class="px-6 py-4">⏰ Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($aktivitas as $log)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-user-circle text-indigo-400"></i>
                                    {{ $log->user->name ?? '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full shadow-sm
                                    {{ $log->aksi == 'login' ? 'bg-green-100 text-green-800' :
                                       ($log->aksi == 'logout' ? 'bg-red-100 text-red-700' :
                                       'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($log->aksi) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $log->deskripsi }}</td>
                            <td class="px-6 py-4 text-gray-500 text-sm italic">{{ $log->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-400 px-6 py-8">
                                <i class="fas fa-info-circle text-2xl mb-2"></i>
                                <p>Tidak ada aktivitas tercatat saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4 border-t text-right bg-gray-50">
            {{ $aktivitas->links() }}
        </div>
    </div>
</div>
@endsection
