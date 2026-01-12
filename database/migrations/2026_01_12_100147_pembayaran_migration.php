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
        Schema::create("pembayaran", function (Blueprint $table) {
            $table->string("ID_PEMBAYARAN")->primary();
            $table->string("NO_PESANAN");
            $table->enum('status',['Belum dibayar','Dibayar','Dikembalikan']);
            $table->timestamp('tanggal_pembayaran',2)->useCurrent();
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
