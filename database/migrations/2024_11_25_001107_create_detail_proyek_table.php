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
    Schema::create('detail_proyek', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('material_id');
        $table->unsignedBigInteger('proyek_id');
        $table->integer('jumlah_digunakan');
        $table->date('tanggal_digunakan');
        $table->text('keterangan');
        $table->decimal('biaya_penggunaan', 10, 2);
        $table->timestamps();

        $table->foreign('material_id')->references('id')->on('material')->onDelete('cascade');
        $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_proyek');
    }
};
