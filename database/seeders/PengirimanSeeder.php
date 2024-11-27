<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengirimanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengiriman')->insert([
            'material_id' => 1, // Pastikan ID material sudah ada
            'tanggal_kirim' => '2024-11-25',
            'tanggal_selesai' => '2024-11-28',
            'status_pengiriman' => 'proses',
            'order_id' => 1, // Pastikan ID order sudah ada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
