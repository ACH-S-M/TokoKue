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
        Schema::create("resep_kue", function (Blueprint $table) {
            $table->bigIncrements("KD_RESEP");
            $table->unsignedBigInteger("KD_KUE");
            $table->unsignedBigInteger("biaya_produksi");
            $table->unsignedinteger("jumlah_hasil_kue");
            $table->foreign("KD_KUE")->references("KD_KUE")->on("kue")->cascadeOnDelete();
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
