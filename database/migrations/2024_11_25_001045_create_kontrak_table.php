<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kontrak', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->text('deskripsi');
        $table->string('bukti_kontrak', 255);
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak');
    }
};
