<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role jika belum ada
        $guruRole = Role::firstOrCreate(['name' => 'guru']);
        $siswaRole = Role::firstOrCreate(['name' => 'siswa']);

        // Buat user guru
        $guru = User::firstOrCreate(
            ['email' => 'guru@example.com'],
            [
                'name' => 'Guru',
                'password' => Hash::make('password'),
            ]
        );
        if (!$guru->hasRole('guru')) {
            $guru->assignRole($guruRole);
        }

        // Buat user siswa
        $siswa = User::firstOrCreate(
            ['email' => 'siswa@example.com'],
            [
                'name' => 'Siswa',
                'password' => Hash::make('password'),
            ]
        );
        if (!$siswa->hasRole('siswa')) {
            $siswa->assignRole($siswaRole);
        }

        // Optional: Assign role ke user ID 1 dan 2 jika belum punya role
        if ($u1 = User::find(1)) {
            $u1->assignRole('guru');
        }

        if ($u2 = User::find(2)) {
            $u2->assignRole('siswa');
        }
    }
}
