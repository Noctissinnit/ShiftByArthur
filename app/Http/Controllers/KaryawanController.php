<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // Ambil semua user yang memiliki role 'karyawan'
        $karyawan = User::role('karyawan')->get();

        // Kirim data ke view
        return view('karyawan.index', compact('karyawan'));
    }

    public function create() {
        return view('karyawan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans',
            'nomor_hp' => 'nullable|numeric',
            'jabatan' => 'required',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $karyawan = User::findOrFail($id); // Cari karyawan berdasarkan ID
        return view('karyawan.edit', compact('karyawan'));
    }

    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }


}
