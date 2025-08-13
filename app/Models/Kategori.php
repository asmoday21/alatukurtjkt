<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
protected $fillable = ['nama', 'icon'];


    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
