<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasSiswa extends Model
{
    protected $fillable = ['user_id', 'aksi', 'deskripsi'];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
