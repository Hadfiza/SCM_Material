<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderMaterialSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_material')->insert([
            'order_code' => 'ORD123',
            'tanggal_order' => '2024-11-25',
            'status_order' => 'baru',
            'proyek_id' => 1, // Pastikan ID proyek sudah ada
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
