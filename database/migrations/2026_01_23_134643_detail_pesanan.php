<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pesanan',function(Blueprint $table) {
            $table->string('KD_VARIASI');
            $table->string('NO_PESANAN');
            $table->unsignedBigInteger('jumlah_pesanan');
            $table->unsignedBigInteger('harga_satuan');
            $table->foreign('KD_VARIASI')->references('KD_VARIASI')->on('variasi_kue');
            $table->foreign('NO_PESANAN')->references('NO_PESANAN')->on('pesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
