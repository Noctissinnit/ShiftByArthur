<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pastikan role sudah ada atau buat jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $karyawanRole = Role::firstOrCreate(['name' => 'karyawan', 'guard_name' => 'web']);

        
        // Buat admin
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password123'), // Ganti dengan password yang aman
        ]);

        // Beri role admin ke user
        if (!$admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }

        // Buat user biasa untuk testing
        $user = User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => Hash::make('password123'),
        ]);

        // Beri role karyawan ke user test
        if (!$user->hasRole('karyawan')) {
            $user->assignRole($karyawanRole);
        }
    }
}
