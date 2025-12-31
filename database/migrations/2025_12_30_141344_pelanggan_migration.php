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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('ID_PELANGGAN');
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan')->unique();
            $table->string('alamat_pelanggan');
            $table->string('telepon_pelanggan');
            $table->string('password_pelanggan');
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
