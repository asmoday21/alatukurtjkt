@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Game</h1>
    <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Tambah Game</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
            <tr>
                <td>{{ $game->judul }}</td>
                <td>{{ $game->deskripsi }}</td>
                <td>
                    @if($game->link)
                        <a href="{{ $game->link }}" target="_blank">Mainkan</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('games.edit', $game) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('games.destroy', $game) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus game ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $games->links() }}
</div>
@endsection
