@php
    $layout = auth()->user()->hasRole('guru') ? 'layouts.guru' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <div class="bg-white border border-gray-200 rounded-3xl shadow-xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-indigo-700 flex items-center gap-2">
            <i class="fas fa-file-alt text-indigo-400"></i> {{ $tugas->judul }}
        </h2>

        <p class="text-gray-700">{{ $tugas->deskripsi }}</p>
        <p class="text-sm text-gray-500">
            🕒 Deadline:
            <strong>{{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y') }}</strong>
        </p>

        {{-- Jika Sudah Mengumpulkan --}}
        @if ($pengumpulan)
            <div class="mt-6 bg-green-50 p-4 rounded-lg border border-green-100 space-y-2">
                <p class="text-green-600 font-semibold">✅ Tugas sudah dikumpulkan</p>
                <p>Nilai: <strong>{{ $pengumpulan->nilai ?? 'Belum dinilai' }}</strong></p>
                @if($pengumpulan->catatan)
                    <p class="italic text-sm text-gray-600">💬 Catatan: {{ $pengumpulan->catatan }}</p>
                @endif
                <p class="text-sm text-gray-500">📎 File: 
                    <a href="{{ asset('storage/' . $pengumpulan->file) }}" target="_blank" class="text-indigo-600 hover:underline">
                        Lihat File
                    </a>
                </p>
            </div>
        @else
            {{-- Form Pengumpulan --}}
            @role('siswa')
            <form method="POST" action="{{ route('tugas.kumpulkan', $tugas->id) }}" enctype="multipart/form-data" class="mt-6 space-y-4">
                @csrf
                <label class="block text-sm font-medium text-gray-700">Upload File Tugas</label>
                <input type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.png"
                       class="block w-full border px-4 py-2 rounded shadow-sm" required>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl shadow-md transition">
                    <i class="fas fa-upload mr-2"></i> Kumpulkan Tugas
                </button>
            </form>
            @endrole
        @endif
    </div>
</div>
@endsection
