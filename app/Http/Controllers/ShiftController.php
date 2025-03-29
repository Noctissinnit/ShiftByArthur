<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index() {
        $shifts = Shift::with('karyawan')->get();
        return view('shift.index', compact('shifts'));
    }

    public function create() {
        $karyawans = Karyawan::all();
        return view('shift.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'shift' => 'required|in:pagi,siang,malam',
        ]);
    
        $shifts = [
            'pagi' => ['08:00', '16:00'],
            'siang' => ['16:00', '00:00'],
            'malam' => ['00:00', '08:00'],
        ];
    
        Shift::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $shifts[$request->shift][0],
            'waktu_selesai' => $shifts[$request->shift][1],
        ]);
    
        return redirect()->route('shift.index')->with('success', 'Shift berhasil ditambahkan.');
    }
    

    public function updateStatus(Request $request, Shift $shift) {
        $request->validate([
            'status' => 'required|in:pending,diterima,selesai',
        ]);

        $shift->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status shift diperbarui.');
    }

    public function lihatAbsensi() {
        $shifts = Shift::whereNotNull('foto_absensi')->with('karyawan')->get();
        return view('admin.absensi.index', compact('shifts'));
    }
}
