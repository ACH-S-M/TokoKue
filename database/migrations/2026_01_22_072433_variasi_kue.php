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
        Schema::create("variasi_kue", function (Blueprint $table) { 
            $table->string('KD_VARIASI')->primary();
            $table->unsignedBigInteger('KD_KUE');
            $table->unsignedBigInteger('harga_kue');
            $table->string('berat_bersih');
            $table->unsignedInteger('diameter_kue');
            $table->unsignedInteger('tinggi_kue');
            $table->unsignedBigInteger('KD_TOPPING')->nullable();
            $table->unsignedBigInteger('KD_RASA');
            $table->enum('ukuran_kue',['S','M','L','XL']);
            $table->foreign('KD_TOPPING')->references('KD_TOPPING')->on('topping')->cascadeOnDelete();
            $table->foreign('KD_RASA')->references('KD_RASA')->on('rasa')->cascadeOnDelete();
            $table->foreign('KD_KUE')->references('KD_KUE')->on('kue');
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
