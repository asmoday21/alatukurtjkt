<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Matematika', 'icon' => 'fas fa-square-root-alt'],
            ['nama' => 'Bahasa Indonesia', 'icon' => 'fas fa-book'],
            ['nama' => 'IPA', 'icon' => 'fas fa-flask'],
            ['nama' => 'IPS', 'icon' => 'fas fa-globe-asia'],
            ['nama' => 'Bahasa Inggris', 'icon' => 'fas fa-language'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
