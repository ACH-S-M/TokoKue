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
        Schema::create("variasi_kue_rasa",function(Blueprint $table) {
           $table->unsignedBigInteger("KD_RASA");
           $table->string("KD_VARIASI");
           $table->foreign("KD_RASA")->references("KD_RASA")->on("rasa");
           $table->foreign("KD_VARIASI")->references("KD_VARIASI")->on("variasi_kue");
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
