@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-5xl mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Jadwal Shift</h2>
        <a href="{{ route('shift.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            Tambah Shift
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-300">
                    <th class="px-6 py-3 text-left">Nama Karyawan</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Waktu Mulai</th>
                    <th class="px-6 py-3 text-left">Waktu Selesai</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shifts as $shift)
                <tr class="border-b border-gray-300">
                    <td class="px-6 py-3">{{ $shift->karyawan->nama }}</td>
                    <td class="px-6 py-3">{{ $shift->tanggal }}</td>
                    <td class="px-6 py-3">{{ $shift->waktu_mulai }}</td>
                    <td class="px-6 py-3">{{ $shift->waktu_selesai }}</td>
                    <td class="px-6 py-3">
                        <form action="{{ route('shift.updateStatus', $shift->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="border px-3 py-2 rounded-lg focus:ring focus:ring-blue-300">
                                <option value="pending" {{ $shift->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ $shift->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="selesai" {{ $shift->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-6 py-3">
                        <a href="{{ route('shift.edit', $shift->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition text-sm">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
