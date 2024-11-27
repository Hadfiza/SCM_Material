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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_laporan');
            $table->string('file_path', 255);
            $table->unsignedBigInteger('proyek_id');
            $table->unsignedBigInteger('detail_proyek_id')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');
            $table->foreign('detail_proyek_id')->references('id')->on('detail_proyek')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
