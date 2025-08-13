<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     * Pastikan 'icon' ada di sini agar bisa diisi melalui create/update.
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'icon',          // tambahkan ini supaya bisa simpan nama file icon
        'poin_penting',
        'kesimpulan',
        'user_id',
    ];

    /**
     * Relasi ke user (guru) pembuat materi.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke paragraf materi.
     */
    public function paragraf()
    {
        return $this->hasMany(Paragraf::class);
    }

    /**
     * Relasi ke komentar pada materi.
     */
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
