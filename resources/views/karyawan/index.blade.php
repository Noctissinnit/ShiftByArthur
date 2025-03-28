@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Kelola Karyawan</h2>

    <!-- Tombol Tambah Karyawan -->
    <div class="mb-4">
        <a href="{{ route('karyawan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Tambah Karyawan
        </a>
    </div>

    <!-- Tabel Karyawan -->
    <div class="bg-white shadow-md rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">#</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Role</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $key => $user)
                <tr class="border">
                    <td class="border p-2">{{ $key + 1 }}</td>
                    <td class="border p-2">{{ $user->name }}</td>
                    <td class="border p-2">{{ $user->email }}</td>
                    <td class="border p-2">
                        @foreach ($user->roles as $role)
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('karyawan.edit', $user->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('karyawan.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" 
                                class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
