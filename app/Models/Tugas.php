<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = ['judul', 'deskripsi', 'deadline', 'user_id'];

    /**
     * Relasi: 1 Tugas bisa memiliki banyak pengumpulan
     */
    public function pengumpulan()
    {
        return $this->hasMany(PengumpulanTugas::class);
    }

    /**
     * Relasi: Tugas dibuat oleh satu user (guru)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
