@php
    $layout = auth()->user()->hasRole('guru') ? 'layouts.guru' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded shadow p-6 animate-fade-in">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6 flex items-center gap-2">
        <i class="fas fa-award text-yellow-500"></i> Hasil Kuis: {{ $kuis->judul }}
    </h2>

    {{-- Skor Besar --}}
    <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white rounded-lg p-6 shadow-lg mb-6 text-center">
        <p class="text-xl font-semibold">Total Skor Anda:</p>
        <p class="text-5xl font-bold mt-2">{{ $skor }} <span class="text-2xl">/ 100</span></p>

        <p class="mt-4 text-sm italic">
            @if ($skor >= 90)
                🎉 Luar biasa! Kamu menguasai materi dengan sangat baik!
            @elseif ($skor >= 75)
                👍 Bagus! Terus tingkatkan pemahamanmu!
            @elseif ($skor >= 50)
                ⚠️ Kamu masih perlu belajar lebih giat.
            @else
                ❗ Jangan menyerah! Pelajari kembali materi dan coba lagi 💪
            @endif
        </p>
    </div>

    {{-- Tabel Hasil --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm border rounded shadow">
            <thead class="bg-gray-100 text-left text-sm text-gray-600">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Soal</th>
                    <th class="px-4 py-2 border">Jawaban Anda</th>
                    <th class="px-4 py-2 border">Kunci Jawaban</th>
                    <th class="px-4 py-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @php $benar = 0; @endphp
                @foreach ($kuis->pertanyaans as $index => $p)
                    @php
                        $jawab = $jawabanUser[$p->id] ?? '-';
                        $isCorrect = $jawab === $p->kunci_jawaban;
                        if ($isCorrect) $benar++;
                    @endphp
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $p->soal }}</td>
                        <td class="px-4 py-2 border">{{ $jawab }}</td>
                        <td class="px-4 py-2 border">{{ $p->kunci_jawaban }}</td>
                        <td class="px-4 py-2 border text-center">
                            @if ($isCorrect)
                                <span class="text-green-600 font-semibold">✅ Benar</span>
                            @else
                                <span class="text-red-600 font-semibold">❌ Salah</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                {{-- Baris Total --}}
                <tr class="bg-indigo-50 font-bold text-indigo-700 text-sm">
                    <td colspan="4" class="px-4 py-3 border text-right">Jumlah Jawaban Benar</td>
                    <td class="px-4 py-3 border text-center">{{ $benar }} / {{ $kuis->pertanyaans->count() }}</td>
                </tr>
                <tr class="bg-indigo-100 font-bold text-indigo-800 text-sm">
                    <td colspan="4" class="px-4 py-3 border text-right">Total Nilai</td>
                    <td class="px-4 py-3 border text-center">{{ $skor }} / 100</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-right mt-6">
        <a href="{{ route('kuis.index') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded shadow transition">
            ← Kembali ke Daftar Kuis
        </a>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
