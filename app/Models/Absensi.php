<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['nama_sesi', 'tanggal', 'user_id'];

public function kehadiran()
{
    return $this->hasMany(Kehadiran::class);
}

}
