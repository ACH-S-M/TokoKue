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
        Schema::create("variasi_kue_topping", function (Blueprint $table) { 
            $table->unsignedBigInteger("KD_TOPPING");
            $table->unsignedBigInteger("KD_VARIASI");
            $table->foreign("KD_TOPPING")->references("KD_TOPPING")->on("topping");
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
