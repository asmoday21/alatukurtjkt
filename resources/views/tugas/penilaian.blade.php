@extends('layouts.guru')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-xl shadow">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-3xl shadow-xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-indigo-700 flex items-center gap-2">
            <i class="fas fa-clipboard-check text-green-500"></i> Penilaian Tugas: {{ $tugas->judul }}
        </h2>

        <form method="POST" action="{{ route('tugas.nilai', $tugas->id) }}" class="space-y-8">
            @csrf

            @foreach ($pengumpulan as $item)
                <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100 shadow-sm">
                    <h3 class="text-lg font-semibold text-indigo-600 mb-2 flex items-center gap-2">
                        <i class="fas fa-user-circle text-indigo-400"></i> {{ $item->user->name }}
                    </h3>

                    <p class="mb-4">
                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800 transition">
                            📎 Lihat File Tugas
                        </a>
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700">🎓 Nilai</label>
                            <input type="number" name="nilai[{{ $item->user_id }}]" value="{{ $item->nilai }}"
                                placeholder="Masukkan nilai..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">📝 Catatan</label>
                            <textarea name="catatan[{{ $item->user_id }}]" rows="2"
                                placeholder="Tulis catatan untuk siswa..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">{{ $item->catatan }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-right pt-4 border-t">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition">
                    <i class="fas fa-save mr-2"></i> Simpan Semua Nilai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
