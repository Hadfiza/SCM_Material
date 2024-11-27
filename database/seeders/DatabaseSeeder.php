<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cari pengguna berdasarkan email
        $user = User::where('email', 'admin@gmail.com')->first();

        // Jika pengguna ditemukan, perbarui data pengguna
        if ($user) {
            $user->update([
                'name' => 'admin',  // Ganti dengan nama yang diinginkan
            ]);
        } else {
            // Jika tidak ditemukan, buat pengguna baru
            User::create([
                'name' => 'New User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
