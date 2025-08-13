@php
    $layout = auth()->user()->hasRole('guru') ? 'layouts.guru' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <div class="bg-white border border-gray-200 rounded-3xl shadow-xl p-8 animate-fade-in space-y-10">

        {{-- Judul Kuis --}}
        <div class="flex items-center gap-3">
            <i class="fas fa-book-reader text-3xl text-indigo-500"></i>
            <h1 class="text-3xl font-extrabold text-indigo-700">{{ $kuis->judul }}</h1>
        </div>
        <p class="text-gray-500 text-sm">Silakan pilih jawaban terbaik dari setiap pertanyaan di bawah ini.</p>

        {{-- Form --}}
        <form method="POST" action="{{ route('kuis.submit', $kuis->id) }}" class="space-y-8">
            @csrf

            @foreach ($kuis->pertanyaans as $i => $soal)
                <div class="bg-gradient-to-br from-white via-indigo-50 to-white border border-indigo-100 rounded-xl p-6 shadow-md hover:shadow-lg transition duration-300">
                    {{-- Progress --}}
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-500">Soal {{ $i + 1 }} dari {{ count($kuis->pertanyaans) }}</span>
                        <div class="w-1/2 bg-gray-200 h-2 rounded-full overflow-hidden">
                            <div class="bg-indigo-500 h-full" style="width: {{ round((($i + 1) / count($kuis->pertanyaans)) * 100) }}%"></div>
                        </div>
                    </div>

                    {{-- Soal --}}
                    <h3 class="text-lg font-semibold text-indigo-700 mb-3">
                        <i class="fas fa-question-circle mr-1"></i>{{ $soal->soal }}
                    </h3>

                    {{-- Pilihan Jawaban --}}
                    <div class="grid gap-4">
                        @foreach(['A', 'B', 'C', 'D'] as $opt)
                            <label class="flex items-start gap-3 cursor-pointer group hover:bg-indigo-100 p-3 rounded-lg transition">
                                <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $opt }}" required
                                    class="mt-1 text-indigo-600 focus:ring-indigo-500">
                                <div>
                                    <span class="font-semibold text-indigo-600">{{ $opt }}.</span>
                                    <span class="text-gray-800">{{ $soal->{'opsi_'.strtolower($opt)} }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- Tombol Kirim --}}
            <div class="text-right pt-6 border-t">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-200">
                    <i class="fas fa-paper-plane animate-pulse"></i> Kirim Jawaban
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
