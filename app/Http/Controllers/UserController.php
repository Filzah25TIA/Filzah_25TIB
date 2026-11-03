<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua data user
        $users = User::all();
        // Menampilkan view admin/user/index.blade.php dengan membawa data $users
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        // Menampilkan form tambah user
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi sesuai modul
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Data User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mencari user berdasarkan ID
        $user = User::findOrFail($id);
        // Menampilkan form edit dengan membawa data user yang dicari
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validasi (tambahkan pengecualian email milik user ini sendiri)
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();

        // Hanya enkripsi dan update password jika form password diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Hapus dari array agar tidak menimpa password lama dengan kosong
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data User berhasil diubah.');
    }

    public function destroy($id)
    {
        // Mencari user lalu menghapusnya
        $user = User::findOrFail($id);
        $user->delete(); // Sesuai instruksi modul

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
