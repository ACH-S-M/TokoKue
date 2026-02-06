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
        Schema::create("keranjang", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("ID_PELANGGAN");
            $table->unsignedBigInteger("KD_VARIASI");
            $table->unsignedBigInteger("qty");
            $table->foreign("ID_PELANGGAN")->references("ID_PELANGGAN")->on("pelanggan")->cascadeOnDelete();
            $table->foreign("KD_VARIASI")->references("KD_VARIASI")->on("variasi_kue")->cascadeOnDelete();
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
