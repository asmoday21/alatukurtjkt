@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-xl font-bold mb-4">Upload Foto Jadi Icon</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('icon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2 font-semibold">Pilih Foto</label>
        <input type="file" name="foto" class="border rounded w-full p-2" required>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Upload & Jadikan Icon
        </button>
    </form>
</div>
@endsection
