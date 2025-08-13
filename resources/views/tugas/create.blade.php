@extends('layouts.guru')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <div class="bg-white border border-gray-200 rounded-3xl shadow-xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-indigo-700 flex items-center gap-2">
            <i class="fas fa-tasks text-yellow-500"></i> Buat Tugas Baru
        </h2>

        <form method="POST" action="{{ route('tugas.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="font-semibold text-gray-700">Judul Tugas</label>
                <input type="text" name="judul" class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label class="font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <div>
                <label class="font-semibold text-gray-700">Deadline</label>
                <input type="date" name="deadline" class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500" required>
            </div>

            <div class="text-right pt-4 border-t">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-200">
                    <i class="fas fa-save mr-2"></i> Simpan Tugas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
