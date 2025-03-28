@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Shift</h2>
    <form action="{{ route('shift.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Karyawan</label>
            <select name="karyawan_id" class="form-control" required>
                <option value="">Pilih Karyawan</option>
                @foreach ($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
