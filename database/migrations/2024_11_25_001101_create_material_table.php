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
    Schema::create('material', function (Blueprint $table) {
        $table->id();
        $table->string('nama_material', 255);
        $table->integer('stok');
        $table->decimal('harga_total', 10, 2);
        $table->string('jenis_material', 100);
        $table->unsignedBigInteger('pemasok_id');
        $table->timestamps();

        $table->foreign('pemasok_id')->references('id')->on('pemasok')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
