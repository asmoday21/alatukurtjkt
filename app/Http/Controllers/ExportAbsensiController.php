<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapAbsensiExport;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportAbsensiController extends Controller
{
    public function excel()
    {
        return Excel::download(new RekapAbsensiExport, 'rekap-absensi.xlsx');
    }

    public function pdf()
    {
        $rekap = Absensi::withCount('kehadiran')->orderByDesc('tanggal')->get();
        $pdf = Pdf::loadView('absensi.pdf', compact('rekap'));
        return $pdf->download('rekap-absensi.pdf');
    }
}
