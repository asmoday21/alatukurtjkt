@extends('layouts.siswa')

@section('title', 'Kerjakan Kuis')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <div class="bg-white border border-gray-200 rounded-3xl shadow-xl p-8 animate-fade-in space-y-10">

        {{-- Judul --}}
        <div class="flex items-center gap-3">
            <i class="fas fa-pen-nib text-3xl text-indigo-500"></i>
            <h1 class="text-3xl font-extrabold text-indigo-700">{{ $kuis->judul }}</h1>
        </div>
        <p class="text-sm text-gray-500">Jawablah semua pertanyaan dengan teliti.</p>

        {{-- Form Jawaban --}}
        <form method="POST" action="{{ route('siswa.kuis.submit', $kuis->id) }}" class="space-y-8">
            @csrf

            @foreach ($kuis->pertanyaans as $i => $soal)
                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-6 shadow hover:shadow-md transition duration-300">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-500">Soal {{ $i + 1 }} dari {{ $kuis->pertanyaans->count() }}</span>
                        <div class="w-1/2 bg-gray-200 h-2 rounded-full overflow-hidden">
                            <div class="bg-indigo-500 h-full" style="width: {{ round(($i + 1) / $kuis->pertanyaans->count() * 100) }}%"></div>
                        </div>
                    </div>

                    <h3 class="text-lg font-semibold text-indigo-700 mb-3">
                        <i class="fas fa-question-circle mr-1"></i> {{ $soal->soal }}
                    </h3>

                    <div class="grid gap-4">
                        @foreach(['A', 'B', 'C', 'D'] as $opt)
                            <label class="flex items-start gap-3 bg-white p-3 rounded-lg border border-gray-200 hover:border-indigo-300 hover:bg-indigo-100 cursor-pointer transition group">
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

            <div class="text-right pt-6 border-t">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-200">
                    <i class="fas fa-paper-plane animate-pulse"></i> Kirim Jawaban
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
