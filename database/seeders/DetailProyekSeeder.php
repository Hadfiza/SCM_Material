<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProyekSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_proyek')->insert([
            'proyek_id' => 1, // Pastikan ID proyek sudah ada
            'nama_tugas' => 'Tugas 1',
            'deskripsi_tugas' => 'Deskripsi Tugas 1',
            'deadline' => '2024-11-30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
