@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <img src="{{ asset('images/shift-logo.png') }}" alt="Shift Scheduler" class="h-16 w-auto">
    </div>
    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-gray-600 mt-2">Selamat datang di sistem pengaturan shift karyawan!</p>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Karyawan -->
        <div class="rounded-lg border border-gray-200 bg-blue-50 shadow-md p-6 flex items-center gap-4">
            <div class="p-3 bg-blue-100 rounded-full">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H5a4 4 0 01-4-4V9a4 4 0 014-4h12a4 4 0 014 4v3"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-blue-700">Total Karyawan</h2>
                <p class="text-2xl font-bold text-blue-900">{{ $totalKaryawan }}</p>
            </div>
        </div>

        <!-- Total Shift -->
        <div class="rounded-lg border border-gray-200 bg-green-50 shadow-md p-6 flex items-center gap-4">
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 15h14M5 19h14"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-green-700">Total Shift</h2>
                <p class="text-2xl font-bold text-green-900">{{ $totalShift }}</p>
            </div>
        </div>

        <!-- Shift Selesai -->
        <div class="rounded-lg border border-gray-200 bg-yellow-50 shadow-md p-6 flex items-center gap-4">
            <div class="p-3 bg-yellow-100 rounded-full">
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-yellow-700">Shift Selesai</h2>
                <p class="text-2xl font-bold text-yellow-900">{{ $shiftSelesai }}</p>
            </div>
        </div>

        <!-- Shift Hari Ini -->
        <div class="rounded-lg border border-gray-200 bg-purple-50 shadow-md p-6 flex items-center gap-4">
            <div class="p-3 bg-purple-100 rounded-full">
                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-purple-700">Shift Hari Ini</h2>
                <p class="text-2xl font-bold text-purple-900">{{ $shiftHariIni }}</p>
            </div>
        </div>
    </div>

    <!-- Kalender -->
    <div class="mt-12 bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Jadwal Shift</h2>
        <div id="calendar"></div>
    </div>
</div>

<!-- FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

@endsection
