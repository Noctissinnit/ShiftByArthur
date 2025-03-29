<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;


class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = User::with('roles')->get(); // Load role-nya
        return view('karyawan.index', compact('karyawan'));
    }


    public function create()
    {
        $roles = Role::all(); // Ambil semua role dari database
        return view('karyawan.create', compact('roles'));
    }
   
    
 
    
    

public function store(Request $request)
{
    // Ambil daftar role dari database
    $roles = Role::pluck('name')->toArray(); // Mengambil semua nama role

    // Validasi input
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => ['required', 'email', Rule::unique('users', 'email'), Rule::unique('karyawans', 'email')],
        'nomor_hp' => 'nullable|string|max:20',
        'jabatan' => 'required|string|in:Staff,Supervisor,Manager,Direktur',
        'password' => 'required|min:6|confirmed',
        'role' => ['required', Rule::in($roles)], // Validasi berdasarkan role di database
    ]);

    // Buat user
    $user = User::create([
        'name' => $validated['nama'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Berikan role
    $user->assignRole($validated['role']);

    // Jika role = Karyawan, buat juga di tabel karyawans
    if ($validated['role'] === 'Karyawan') {
        Karyawan::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'nomor_hp' => $validated['nomor_hp'] ?? null,
            'jabatan' => $validated['jabatan'],
            'password' => Hash::make($validated['password']),
        ]);
    }

    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
}

    
    public function edit($id)
    {
        $karyawan = User::findOrFail($id); // Ambil data user berdasarkan ID
        return view('karyawan.edit', compact('karyawan')); // Kirim ke view
    }
        
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'nomor_hp' => 'nullable|string|max:20',
            'jabatan' => 'required|string|in:Staff,Supervisor,Manager,Direktur',
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|string|in:Admin,Karyawan',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // 🔥 Pastikan role lama dihapus dulu, baru tambahkan role baru
        $user->roles()->detach(); // Hapus semua role lama
        $user->assignRole($request->role); // Tambahkan role baru

        // Logika hapus/update di tabel karyawans
        if ($request->role == 'Admin') {
            // Jika role berubah menjadi Admin, hapus dari tabel karyawans
            Karyawan::where('email', $user->email)->delete();
        } else {
            // Jika role tetap Karyawan, update datanya di tabel karyawans
            Karyawan::updateOrCreate(
                ['email' => $user->email], // Kondisi pencarian
                [
                    'nama' => $request->nama,
                    'nomor_hp' => $request->nomor_hp ?? null,
                    'jabatan' => $request->jabatan,
                    'password' => $user->password, // Sama dengan password di users
                ]
            );
        }

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }




    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }


}
