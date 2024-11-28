<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemasok', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nama_pemasok', 255); // Nama pemasok
            $table->text('alamat')->nullable(); // Alamat pemasok (opsional)
            $table->string('kontak', 255)->nullable(); // Kontak pemasok (opsional)
            $table->foreignId('kontrak_id')->nullable() // Relasi ke tabel kontrak
                  ->constrained('kontrak') // Nama tabel yang dirujuk
                  ->onDelete('cascade'); // Hapus data pemasok jika kontrak terkait dihapus
            $table->integer('rating_pemasok')->default(0); // Rating default 0
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemasok');
    }
};
