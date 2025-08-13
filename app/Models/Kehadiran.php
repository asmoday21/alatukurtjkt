<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = ['absensi_id', 'user_id', 'waktu_hadir'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
