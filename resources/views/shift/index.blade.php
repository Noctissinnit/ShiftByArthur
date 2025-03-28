@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Shift</h2>
    <a href="{{ route('shift.create') }}" class="btn btn-primary">Tambah Shift</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $shift)
            <tr>
                <td>{{ $shift->karyawan->nama }}</td>
                <td>{{ $shift->tanggal }}</td>
                <td>{{ $shift->waktu_mulai }}</td>
                <td>{{ $shift->waktu_selesai }}</td>
                <td>
                    <form action="{{ route('shift.updateStatus', $shift->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()">
                            <option value="pending" {{ $shift->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diterima" {{ $shift->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="selesai" {{ $shift->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
