<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'aktivitas'; // atau 'tb_aktivitas' jika kamu pakai prefix
    protected $fillable = ['user_id', 'deskripsi', 'created_at'];
}
