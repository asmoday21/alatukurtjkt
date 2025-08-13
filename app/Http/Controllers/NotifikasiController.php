<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = auth()->user()->notifications()->latest()->get();
        return view('notifikasi.index', compact('notifikasi'));
    }
}
