<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::where('user_id', auth()->id())->latest()->paginate(10);
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        Game::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
        ]);

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan.');
    }

    public function show(Game $game)
    {
        $this->authorize('view', $game);
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $this->authorize('update', $game);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $this->authorize('update', $game);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        $game->update($request->all());

        return redirect()->route('games.index')->with('success', 'Game berhasil diperbarui.');
    }

    public function destroy(Game $game)
    {
        $this->authorize('delete', $game);
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game berhasil dihapus.');
    }
}
