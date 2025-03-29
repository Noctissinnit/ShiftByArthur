<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = ['karyawan_id', 'tanggal', 'shift', 'status'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    // Tambahkan fungsi untuk mendapatkan waktu mulai dan selesai berdasarkan shift
    public function getWaktuMulaiAttribute()
    {
        return [
            'pagi' => '08:00',
            'siang' => '16:00',
            'malam' => '00:00',
        ][$this->shift];
    }

    public function getWaktuSelesaiAttribute()
    {
        return [
            'pagi' => '16:00',
            'siang' => '00:00',
            'malam' => '08:00',
        ][$this->shift];
    }
}
