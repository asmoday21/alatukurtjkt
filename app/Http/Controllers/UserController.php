<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Tampilkan daftar semua user
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        $roles = Role::pluck('name');
        return view('users.create', compact('roles'));
    }

    /**
     * Simpan user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|string|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', '✅ User berhasil ditambahkan.');
    }

    /**
     * Form edit user
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::pluck('name');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update data user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => "required|email|unique:users,email,$id",
            'role'  => 'required|string|exists:roles,name',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'nullable|string|min:6'
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', '✅ User berhasil diupdate.');
    }

    /**
     * Hapus user
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', '✅ User berhasil dihapus.');
        } catch (\Throwable $e) {
            return redirect()->route('users.index')->with('error', '❌ Gagal menghapus user: ' . $e->getMessage());
        }
    }

    /**
     * Form registrasi khusus siswa
     */
    public function showSiswaRegisterForm()
    {
        return view('auth.register-siswa');
    }

    /**
     * Proses registrasi siswa
     */
    public function registerSiswa(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Otomatis assign role siswa
        $user->assignRole('siswa');

        return redirect()->route('login')->with('success', '✅ Registrasi berhasil, silakan login.');
    }
}
