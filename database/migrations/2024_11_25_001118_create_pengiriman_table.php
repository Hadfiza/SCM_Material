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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->datetime('tanggal_kirim');
            $table->datetime('tanggal_selesai')->nullable();
            $table->enum('status_pengiriman', ['proses', 'dikirim', 'batal','selesai']);
            $table->unsignedBigInteger('order_id')->nullable();  // Make order_id nullable
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('material')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('order_material')->onDelete('cascade')->nullable();  // Ensure it accepts null values
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
