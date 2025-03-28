@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p class="text-gray-600">Selamat datang di sistem pengaturan shift karyawan!</p>

    <!-- Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Total Karyawan</h2>
            <p class="text-2xl font-bold">{{ $totalKaryawan }}</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Total Shift</h2>
            <p class="text-2xl font-bold">{{ $totalShift }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Shift Selesai</h2>
            <p class="text-2xl font-bold">{{ $shiftSelesai }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Shift Hari Ini</h2>
            <p class="text-2xl font-bold">{{ $shiftHariIni }}</p>
        </div>
    </div>

    <!-- Jadwal Shift -->
    <div class="bg-white p-6 rounded-lg shadow mt-6">
        <h2 class="text-lg font-semibold">Jadwal Shift</h2>
        <p>Data jadwal shift akan ditampilkan di sini.</p>
    </div>
</div>
@endsection
