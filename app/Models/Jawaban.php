<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    public function pertanyaan() {
    return $this->belongsTo(Pertanyaan::class);
}
public function user() {
    return $this->belongsTo(User::class);
}
protected $fillable = ['pertanyaan_id', 'user_id', 'jawaban_dipilih', 'benar'];

}
