<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
   protected $fillable = ['tugas_id', 'user_id', 'file', 'nilai', 'catatan'];

public function tugas()
{
    return $this->belongsTo(Tugas::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
