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

    public function store(Request $request) {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
        ]);

        Shift::create($request->all());

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
