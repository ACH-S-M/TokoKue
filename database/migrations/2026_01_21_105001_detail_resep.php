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
        
        Schema::create("detail_resep", function (Blueprint $table) {
            $table->unsignedBigInteger("KD_RESEP");
            $table->unsignedBigInteger("ID_BAHAN");
            $table->unsignedInteger("jumlah_bahan");
            $table->string("satuan");
            $table->foreign("KD_RESEP")->references("KD_RESEP")->on("resep_kue")->cascadeOnDelete();
            $table->foreign("ID_BAHAN")->references("ID_BAHAN")->on("bahan_kue")->cascadeOnDelete();
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
