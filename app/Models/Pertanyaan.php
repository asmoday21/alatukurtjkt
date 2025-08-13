<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaans'; // <== ini wajib


   public function kuis() {
    return $this->belongsTo(Kuis::class);
}
public function jawabans() {
    return $this->hasMany(Jawaban::class);
}
protected $fillable = ['kuis_id', 'soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'kunci_jawaban'];

}
