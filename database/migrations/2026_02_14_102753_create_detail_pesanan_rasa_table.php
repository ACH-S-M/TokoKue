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
        Schema::create('detail_pesanan_rasa', function (Blueprint $table) {
            $table->id();
            $table->string('NO_PESANAN');
            $table->unsignedBigInteger('KD_VARIASI');
            $table->unsignedBigInteger('KD_RASA');
            
            // Foreign keys
            $table->foreign('NO_PESANAN')->references('NO_PESANAN')->on('pesanan')->onDelete('cascade');
            $table->foreign('KD_VARIASI')->references('KD_VARIASI')->on('variasi_kue')->onDelete('cascade');
            $table->foreign('KD_RASA')->references('KD_RASA')->on('rasa')->onDelete('cascade');
            
            // Composite unique constraint
            $table->unique(['NO_PESANAN', 'KD_VARIASI', 'KD_RASA'], 'detail_pesanan_rasa_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan_rasa');
    }
};
