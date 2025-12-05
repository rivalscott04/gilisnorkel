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
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'adult')) {
                $table->integer('adult')->default(1)->after('paket_harga_id');
            }
            if (!Schema::hasColumn('bookings', 'children')) {
                $table->integer('children')->default(0)->after('adult');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['adult', 'children']);
        });
    }
};
