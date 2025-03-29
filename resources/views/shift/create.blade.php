@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Tambah Shift</h2>
    <form action="{{ route('shift.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Karyawan</label>
            <select name="karyawan_id" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Karyawan</option>
                @foreach ($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Tanggal</label>
            <input type="date" name="tanggal" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Shift</label>
            <select name="shift" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Shift</option>
                <option value="pagi">Pagi (08:00 - 16:00)</option>
                <option value="siang">Siang (16:00 - 00:00)</option>
                <option value="malam">Malam (00:00 - 08:00)</option>
            </select>
        </div>
        
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">Simpan Shift</button>
    </form>
</div>
@endsection
