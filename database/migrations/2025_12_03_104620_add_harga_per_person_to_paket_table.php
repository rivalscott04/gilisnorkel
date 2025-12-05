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
        Schema::table('paket', function (Blueprint $table) {
            if (!Schema::hasColumn('paket', 'harga_per_person')) {
                $table->integer('harga_per_person')->nullable()->after('max_person');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket', function (Blueprint $table) {
            if (Schema::hasColumn('paket', 'harga_per_person')) {
                $table->dropColumn('harga_per_person');
            }
        });
    }
};
