<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Tugas;
use App\Models\Kuis;
use Illuminate\Support\Facades\Auth;

class StatistikController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasRole('guru')) abort(403);

        $data = [
            'materi' => Materi::count(),
            'tugas' => Tugas::count(),
            'kuis' => Kuis::count(),
        ];

        return view('statistik.index', compact('data'));
    }
}

