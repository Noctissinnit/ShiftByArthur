@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bukti Absensi Karyawan</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Foto Absensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $shift)
            <tr>
                <td>{{ $shift->karyawan->nama }}</td>
                <td>{{ $shift->tanggal }}</td>
                <td><a href="{{ asset('storage/' . $shift->foto_absensi) }}" target="_blank">Lihat Foto</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
