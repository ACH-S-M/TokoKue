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
            $table->string('nama_penerima');
            $table->string('alamat_spesifik');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->enum('status',['belum_dibayar','diproses','dikirim','selesai','dibatalkan'])->default('belum_dibayar');
            $table->unsignedinteger('total_harga');
            $table->timestamp('tanggal_pesanan')->useCurrent();
            $table->text('catatan')->nullable();
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
