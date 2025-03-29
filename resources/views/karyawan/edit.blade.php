@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Karyawan</h2>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama</label>
            <input type="text" name="nama" value="{{ $karyawan->name }}" class="w-full p-2 border rounded-lg focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" value="{{ $karyawan->email }}" class="w-full p-2 border rounded-lg focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nomor HP</label>
            <input type="text" name="nomor_hp" value="{{ $karyawan->nomor_hp }}" class="w-full p-2 border rounded-lg focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
            <select name="jabatan" class="w-full p-2 border rounded-lg focus:ring-blue-500" required>
                <option value="Staff" {{ $karyawan->jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                <option value="Supervisor" {{ $karyawan->jabatan == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Manager" {{ $karyawan->jabatan == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Direktur" {{ $karyawan->jabatan == 'Direktur' ? 'selected' : '' }}>Direktur</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Role</label>
            <select name="role" class="w-full p-2 border rounded-lg focus:ring-blue-500" required>
                <option value="Admin" {{ $karyawan->hasRole('Admin') ? 'selected' : '' }}>Admin</option>
                <option value="Karyawan" {{ $karyawan->hasRole('Karyawan') ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="w-full p-2 border rounded-lg focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded-lg focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">Update</button>
    </form>
</div>
@endsection
