<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasokSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemasok')->insert([
            'nama_pemasok' => 'Pemasok 1',
            'alamat' => 'Alamat Pemasok 1',
            'telepon' => '08123456789',
            'email' => 'pemasok1@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
