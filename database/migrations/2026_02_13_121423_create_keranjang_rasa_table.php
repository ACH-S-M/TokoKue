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
        Schema::create('keranjang_rasa', function (Blueprint $table) {
            $table->unsignedBigInteger('keranjang_id');
            $table->unsignedBigInteger('KD_RASA');
            $table->foreign('keranjang_id')->references('id')->on('keranjang')->cascadeOnDelete();
            $table->foreign('KD_RASA')->references('KD_RASA')->on('rasa')->cascadeOnDelete();
            $table->primary(['keranjang_id', 'KD_RASA']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_rasa');
    }
};
