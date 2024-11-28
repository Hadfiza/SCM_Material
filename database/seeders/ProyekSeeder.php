<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    public function run()
    {
        DB::table('proyek')->insert([
            'nama_proyek' => 'Proyek 1',
            'deskripsi' => 'Deskripsi Proyek 1',
            'tanggal_mulai' => '2024-11-01',
            'tanggal_selesai' => '2024-12-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('proyek')->insert([
            'nama_proyek' => 'Proyek 2',
            'deskripsi' => 'Deskripsi Proyek 2',
            'tanggal_mulai' => '2024-11-15',
            'tanggal_selesai' => '2024-12-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
