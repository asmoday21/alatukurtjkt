<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    public function pertanyaans() {
    return $this->hasMany(Pertanyaan::class);
}
public function user() {
    return $this->belongsTo(User::class);
}
 protected $fillable = [
        'judul',
        'deskripsi',
        'link',
        'user_id'
    ];


}
