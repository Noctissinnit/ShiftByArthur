@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-5xl mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Karyawan</h2>
        <a href="{{ route('karyawan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            Tambah Karyawan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-300 text-left">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $key => $user)
                <tr class="border-b border-gray-300">
                    <td class="px-6 py-3">{{ $key + 1 }}</td>
                    <td class="px-6 py-3">{{ $user->name }}</td>
                    <td class="px-6 py-3">{{ $user->email }}</td>
                    <td class="px-6 py-3">
                        @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $role)
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">{{ $role->name }}</span>
                            @endforeach
                        @else
                            <span class="bg-gray-400 text-white px-2 py-1 rounded text-sm">Tidak ada role</span>
                        @endif
                    </td>
                    
                    <td class="px-6 py-3 flex gap-2">
                        <a href="{{ route('karyawan.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition text-sm">
                            Edit
                        </a>
                        <form action="{{ route('karyawan.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition text-sm">
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
