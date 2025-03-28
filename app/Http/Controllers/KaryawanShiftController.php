<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanShiftController extends Controller
{
    public function index() {
        $shifts = Shift::where('karyawan_id', Auth::id())->orderBy('tanggal', 'asc')->get();
        return view('karyawan.shift.index', compact('shifts'));
    }

    public function uploadAbsensi(Request $request, Shift $shift) {
        $request->validate([
            'foto_absensi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $filePath = $request->file('foto_absensi')->store('absensi', 'public');
    
        $shift->update([
            'foto_absensi' => $filePath,
            'status' => 'selesai',
        ]);
    
        return redirect()->back()->with('success', 'Absensi berhasil diunggah.');
    }
}
