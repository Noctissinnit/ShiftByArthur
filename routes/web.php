<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanShiftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy'); // ✅ Route delet

    Route::get('/shift', [ShiftController::class, 'index'])->name('shift.index');
    Route::get('/shift/create', [ShiftController::class, 'create'])->name('shift.create');
    Route::post('/shift', [ShiftController::class, 'store'])->name('shift.store');
    Route::put('/shift/{shift}/status', [ShiftController::class, 'updateStatus'])->name('shift.updateStatus');

    Route::get('/admin/shift/absensi', [ShiftController::class, 'lihatAbsensi'])->name('admin.shift.absensi');
});

Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/karyawan/shift', [KaryawanShiftController::class, 'index'])->name('karyawan.shift.index');
    Route::post('/karyawan/shift/{shift}/absensi', [KaryawanShiftController::class, 'uploadAbsensi'])->name('karyawan.shift.absensi');
});


require __DIR__.'/auth.php';
