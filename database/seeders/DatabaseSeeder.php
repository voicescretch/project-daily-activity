<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Rendi Apriliyan',
            'email' => 'rendiapriliyan@gmail.com',
            'jabatan' => 'Admin',
            'password' => Hash::make('123456'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Rendi',
            'email' => 'rendi@example.com',
            'jabatan' => 'Karyawan',
            'password' => Hash::make('123456'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Tono',
            'email' => 'tono@example.com',
            'jabatan' => 'Karyawan',
            'password' => Hash::make('123456'),
            'is_tugas' => false,
        ]);
    }
}
