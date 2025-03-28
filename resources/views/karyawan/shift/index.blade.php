@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Shift Saya</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $shift)
            <tr>
                <td>{{ $shift->tanggal }}</td>
                <td>{{ $shift->waktu_mulai }}</td>
                <td>{{ $shift->waktu_selesai }}</td>
                <td>{{ ucfirst($shift->status) }}</td>
            </tr>
            @endforeach
        </tbody>
        <td>
            @if ($shift->status == 'diterima' && !$shift->foto_absensi)
            <form action="{{ route('karyawan.shift.absensi', $shift->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="foto_absensi" accept="image/*" required>
                <button type="submit" class="btn btn-sm btn-success">Upload</button>
            </form>
            @elseif ($shift->foto_absensi)
            <a href="{{ asset('storage/' . $shift->foto_absensi) }}" target="_blank">Lihat Foto</a>
            @else
            Belum bisa absen
            @endif
        </td>
    </table>
</div>
@endsection
