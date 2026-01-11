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
            $table->unsignedbigInteger('KD_KUE');
            $table->string('NO_PESANAN');
            $table->integer('jumlah');
            $table->foreign('KD_KUE')->references('KD_KUE')->on('kue');
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
