<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasSiswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'aksi', 'deskripsi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
