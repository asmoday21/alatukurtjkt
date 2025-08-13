@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="bg-gradient-to-br from-white via-indigo-50 to-white border border-indigo-100 rounded-2xl shadow-2xl p-8 space-y-10 animate-fade-in">

        {{-- Header & Jumlah Soal --}}
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-6 border-b pb-6">
            <div>
                <h2 class="text-4xl font-bold text-indigo-700 flex items-center gap-3">
                    <i class="fas fa-layer-group text-yellow-400"></i> Buat Kuis
                </h2>
                <p class="text-gray-500 text-sm">Isi data kuis berikut dan tentukan jumlah soal yang ingin dibuat.</p>
            </div>

            {{-- Dropdown Jumlah Soal --}}
            <form method="GET" action="{{ route('kuis.create') }}" class="flex items-center gap-2">
                <label for="jumlah_soal" class="text-sm font-medium text-gray-700">Jumlah Soal</label>
                <select name="jumlah_soal" id="jumlah_soal" onchange="this.form.submit()"
                    class="rounded-lg border border-gray-300 shadow-sm px-3 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach ([2, 5, 10, 15, 20, 30, 40, 50] as $jumlah)
                        <option value="{{ $jumlah }}" {{ request('jumlah_soal', 5) == $jumlah ? 'selected' : '' }}>
                            {{ $jumlah }} Soal
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('kuis.store') }}" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-700">Judul Kuis</label>
                <input type="text" name="judul"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500"
                    placeholder="Contoh: Kuis Perspektif Gambar" required>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-700">Deskripsi Kuis</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500"
                    placeholder="Tuliskan deskripsi singkat tentang kuis ini..."></textarea>
            </div>

            {{-- Soal-soal --}}
            <div class="space-y-10">
                @php $jumlahSoal = request('jumlah_soal', 5); @endphp
                @for($i = 0; $i < $jumlahSoal; $i++)
                    <div class="bg-white border border-indigo-100 rounded-xl p-6 shadow hover:shadow-md transition duration-300">
                        <h3 class="text-xl font-semibold text-indigo-700 mb-4 flex items-center gap-2">
                            <i class="fas fa-question-circle text-indigo-400"></i> Soal No. {{ $i + 1 }}
                        </h3>

                        {{-- Pertanyaan --}}
                        <label class="block mb-1 text-sm text-gray-700">Pertanyaan</label>
                        <textarea name="pertanyaan[{{ $i }}][soal]" rows="2"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Masukkan pertanyaan..." required></textarea>

                        {{-- Opsi Jawaban --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                            @foreach(['a','b','c','d'] as $abjad)
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Opsi {{ strtoupper($abjad) }}</label>
                                    <input type="text" name="pertanyaan[{{ $i }}][opsi_{{ $abjad }}]"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-indigo-400"
                                        placeholder="Jawaban opsi {{ strtoupper($abjad) }}" required>
                                </div>
                            @endforeach
                        </div>

                        {{-- Kunci Jawaban --}}
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jawaban yang Benar</label>
                            <select name="pertanyaan[{{ $i }}][kunci_jawaban]"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih jawaban yang benar</option>
                                <option value="A">Jawaban A</option>
                                <option value="B">Jawaban B</option>
                                <option value="C">Jawaban C</option>
                                <option value="D">Jawaban D</option>
                            </select>
                        </div>
                    </div>
                @endfor
            </div>

            {{-- Submit --}}
            <div class="pt-6 border-t text-right">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-200">
                    <i class="fas fa-save mr-2"></i> Simpan Kuis
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
