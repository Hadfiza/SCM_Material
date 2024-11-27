<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        DB::table('material')->insert([
            'nama_material' => 'Material 1',
            'deskripsi' => 'Deskripsi Material 1',
            'harga' => 100000,
            'stok' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('material')->insert([
            'nama_material' => 'Material 2',
            'deskripsi' => 'Deskripsi Material 2',
            'harga' => 150000,
            'stok' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
