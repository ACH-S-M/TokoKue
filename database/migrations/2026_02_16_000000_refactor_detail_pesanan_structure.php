<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add ID to detail_pesanan
        Schema::table('detail_pesanan', function (Blueprint $table) {
            $table->id()->first();
        });

        // 2. Add detail_pesanan_id to detail_pesanan_topping
        Schema::table('detail_pesanan_topping', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_pesanan_id')->after('id')->nullable();
        });

        // 3. Add detail_pesanan_id to detail_pesanan_rasa
        Schema::table('detail_pesanan_rasa', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_pesanan_id')->after('id')->nullable();
        });

        // 4. Fill detail_pesanan_id in child tables based on matching NO_PESANAN and KD_VARIASI
        // We use a raw SQL update for efficiency and because we are in a migration
        $updateToppingSql = "
            UPDATE detail_pesanan_topping t
            JOIN detail_pesanan d ON t.NO_PESANAN = d.NO_PESANAN AND t.KD_VARIASI = d.KD_VARIASI
            SET t.detail_pesanan_id = d.id
        ";
        DB::statement($updateToppingSql);

        $updateRasaSql = "
            UPDATE detail_pesanan_rasa r
            JOIN detail_pesanan d ON r.NO_PESANAN = d.NO_PESANAN AND r.KD_VARIASI = d.KD_VARIASI
            SET r.detail_pesanan_id = d.id
        ";
        DB::statement($updateRasaSql);

        // 5. Add Foreign Keys and Drop Old Constraints for Topping
        Schema::table('detail_pesanan_topping', function (Blueprint $table) {
             // Drop the old composite unique constraint
             // The name was defined in the previous migration as 'detail_pesanan_topping_unique'
            $table->dropUnique('detail_pesanan_topping_unique');

            // Make detail_pesanan_id required now that we've filled it (if there was data)
            // But if there was orphaned data, it might fail. For safety in dev, we'll leave it nullable or cascade delete orphans.
            // Let's just make it a foreign key.
            $table->foreign('detail_pesanan_id')->references('id')->on('detail_pesanan')->onDelete('cascade');
        });

        // 6. Add Foreign Keys and Drop Old Constraints for Rasa
        Schema::table('detail_pesanan_rasa', function (Blueprint $table) {
            $table->dropUnique('detail_pesanan_rasa_unique');
            $table->foreign('detail_pesanan_id')->references('id')->on('detail_pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert changes
        Schema::table('detail_pesanan_rasa', function (Blueprint $table) {
            $table->dropForeign(['detail_pesanan_id']);
            $table->dropColumn('detail_pesanan_id');
            // Re-adding the unique constraint might fail if we have duplicates now, but strictly speaking we should try
            $table->unique(['NO_PESANAN', 'KD_VARIASI', 'KD_RASA'], 'detail_pesanan_rasa_unique');
        });

        Schema::table('detail_pesanan_topping', function (Blueprint $table) {
             $table->dropForeign(['detail_pesanan_id']);
             $table->dropColumn('detail_pesanan_id');
             $table->unique(['NO_PESANAN', 'KD_VARIASI', 'KD_TOPPING'], 'detail_pesanan_topping_unique');
        });

        Schema::table('detail_pesanan', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
