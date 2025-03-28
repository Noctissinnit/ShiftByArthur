<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalKaryawan' => User::count(), 
            'totalShift' => Shift::count(),
            'shiftSelesai' => Shift::where('status', 'selesai')->count(),
            'shiftHariIni' => Shift::whereDate('tanggal', now()->toDateString())->count(),
        ]);
    }
}
