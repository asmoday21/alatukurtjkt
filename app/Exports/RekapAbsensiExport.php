<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapAbsensiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Absensi::withCount('kehadiran')->get()->map(function ($item) {
            return [
                'tanggal' => $item->tanggal,
                'sesi' => $item->nama_sesi,
                'jumlah_hadir' => $item->kehadiran_count,
            ];
        });
    }

    public function headings(): array
    {
        return ['Tanggal', 'Sesi', 'Jumlah Hadir'];
    }
}
