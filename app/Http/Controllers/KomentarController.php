<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Materi;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required|string|max:1000',
        ]);

        $materi = Materi::findOrFail($id);

        Komentar::create([
            'materi_id' => $materi->id,
            'user_id' => auth()->id(),
            'isi' => $request->isi,
        ]);

        return redirect()->route('materi.show', $materi->id);
    }
}
