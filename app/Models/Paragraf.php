<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paragraf extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi_id',
        'teks',
        'video',
        'gambar'
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
