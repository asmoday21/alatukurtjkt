@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 shadow">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-indigo-100 rounded-2xl shadow-2xl p-8 space-y-10">

        <h2 class="text-4xl font-bold text-indigo-700 flex items-center gap-3 mb-6">
            <i class="fas fa-edit text-yellow-400"></i> Edit Kuis
        </h2>

        <form method="POST" action="{{ route('kuis.update', $kuis->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Judul Kuis</label>
                <input type="text" name="judul" value="{{ old('judul', $kuis->judul) }}"
                    class="w-full px-4 py-3 border rounded-xl shadow-sm focus:ring-indigo-500" required>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full px-4 py-3 border rounded-xl shadow-sm focus:ring-indigo-500">{{ old('deskripsi', $kuis->deskripsi) }}</textarea>
            </div>

            {{-- Soal --}}
            <div class="space-y-10">
                @foreach ($kuis->pertanyaans as $i => $soal)
                    <div class="bg-gray-50 border rounded-xl p-6 shadow-sm">
                        <input type="hidden" name="pertanyaans[{{ $i }}][id]" value="{{ $soal->id }}">

                        <h3 class="text-xl font-semibold text-indigo-700 mb-4">Soal No. {{ $i + 1 }}</h3>

                        <label class="block text-sm font-medium text-gray-600 mb-1">Pertanyaan</label>
                        <textarea name="pertanyaans[{{ $i }}][soal]" rows="2"
                            class="w-full px-3 py-2 border rounded-md focus:ring-indigo-500" required>{{ $soal->soal }}</textarea>

                        <div class="grid sm:grid-cols-2 gap-4 mt-4">
                            @foreach (['a', 'b', 'c', 'd'] as $opt)
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Opsi {{ strtoupper($opt) }}</label>
                                    <input type="text" name="pertanyaans[{{ $i }}][opsi_{{ $opt }}]"
                                        value="{{ $soal->{'opsi_'.$opt} }}"
                                        class="w-full px-3 py-2 border rounded-md focus:ring-indigo-400" required>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jawaban yang Benar</label>
                            <select name="pertanyaans[{{ $i }}][kunci_jawaban]"
                                class="w-full px-3 py-2 border rounded-md focus:ring-green-500" required>
                                <option value="">Pilih jawaban yang benar</option>
                                @foreach (['A','B','C','D'] as $opt)
                                    <option value="{{ $opt }}" {{ $soal->kunci_jawaban == $opt ? 'selected' : '' }}>
                                        Jawaban {{ $opt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Submit --}}
            <div class="pt-6 text-right border-t">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
