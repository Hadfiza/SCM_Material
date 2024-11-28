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
    Schema::create('order_material', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('material_id');
        $table->unsignedBigInteger('pengiriman_id')->nullable();
        $table->integer('jumlah_order');
        $table->date('tanggal_order');
        $table->enum('status_order', ['pending', 'proses', 'selesai', 'batal']);
        $table->text('keterangan')->nullable();
        $table->timestamps();

        $table->foreign('material_id')->references('id')->on('material')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_material');
    }
};
