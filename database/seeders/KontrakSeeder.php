<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontrakSeeder extends Seeder
{
    public function run()
    {
        DB::table('kontrak')->insert([
            'no_kontrak' => 'KONTRAK001',
            'tanggal_kontrak' => '2024-11-25',
            'proyek_id' => 1, // Pastikan ID proyek sudah ada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
