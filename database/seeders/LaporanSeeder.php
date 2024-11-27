<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        DB::table('laporan')->insert([
            'tanggal_laporan' => '2024-11-25',
            'file_path' => 'path/to/file',
            'proyek_id' => 1, // Pastikan ID proyek sudah ada
            'detail_proyek_id' => 1, // Pastikan ID detail proyek sudah ada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
