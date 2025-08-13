@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Game</h1>
    <form action="{{ route('games.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Game</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link Game</label>
            <input type="url" name="link" id="link" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
