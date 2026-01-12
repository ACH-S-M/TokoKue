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
        Schema::create('pesanan',function(Blueprint $table){
            $table->string('NO_PESANAN')->primary();
            $table->unsignedbigInteger('ID_PELANGGAN');
            $table->foreign('ID_PELANGGAN')->references('ID_PELANGGAN')->on('pelanggan');
            $table->unsignedinteger('total_harga');
            $table->date('tanggal_pesanan')->use_current();
            $table->text('catatan');
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
