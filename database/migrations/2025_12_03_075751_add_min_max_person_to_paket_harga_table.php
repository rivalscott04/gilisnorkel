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
        Schema::table('paket_harga', function (Blueprint $table) {
            if (!Schema::hasColumn('paket_harga', 'min_person')) {
                $table->integer('min_person')->default(1)->after('harga');
            }
            if (!Schema::hasColumn('paket_harga', 'max_person')) {
                $table->integer('max_person')->default(1)->after('min_person');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_harga', function (Blueprint $table) {
            $table->dropColumn(['min_person', 'max_person']);
        });
    }
};
