@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Admin</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Total Karyawan</h5>
                    <h3>{{ $totalKaryawan }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Total Shift</h5>
                    <h3>{{ $totalShift }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Shift Selesai</h5>
                    <h3>{{ $shiftSelesai }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Shift Hari Ini</h5>
                    <h3>{{ $shiftHariIni }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
