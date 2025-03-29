<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans'; // Pastikan ini mengarah ke tabel yang benar

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'jabatan',
        'password',
    ];
}
