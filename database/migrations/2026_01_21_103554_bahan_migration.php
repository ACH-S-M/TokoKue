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
         Schema::create("bahan_kue", function (Blueprint $table) {
            $table->bigIncrements("ID_BAHAN");
            $table->string("nama_bahan");
            $table->unsignedInteger("harga_bahan");
            $table->unsignedInteger("stok_bahan");
            $table->date("tanggal_pembelian")->useCurrent();
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
