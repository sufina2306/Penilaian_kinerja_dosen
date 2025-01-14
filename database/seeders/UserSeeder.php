<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan pengguna dengan level, email, nama, nip, pangkat, jabatan, unitkerja, dan prodi yang ditentukan
        DB::table('users')->insert([
            [
                'level' => 'admin', 
                'email' => 'admin@example.com', 
                'name' => 'Admin User', 
                'password' => bcrypt('password'), 
                'nip' => '123456',
                'pangkat' => 'Pangkat A',
                'jabatan' => 'Jabatan A',
                'unitkerja' => 'Unit Kerja A',
                'prodi' => 'Prodi A'
            ],
            [
                'level' => 'dosen', 
                'email' => 'dosen@example.com', 
                'name' => 'Dosen User', 
                'password' => bcrypt('password'), 
                'nip' => '654321',
                'pangkat' => 'Pangkat B',
                'jabatan' => 'Jabatan B',
                'unitkerja' => 'Unit Kerja B',
                'prodi' => 'Prodi B'
            ],
            [
                'level' => 'atasan', 
                'email' => 'atasan@example.com', 
                'name' => 'Atasan User', 
                'password' => bcrypt('password'), 
                'nip' => '789012',
                'pangkat' => 'Pangkat C',
                'jabatan' => 'Jabatan C',
                'unitkerja' => 'Unit Kerja C',
                'prodi' => 'Prodi C'
            ],
        ]);
    }
}
