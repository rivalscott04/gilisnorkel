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
            if (!Schema::hasColumn('paket', 'max_person')) {
                $table->integer('max_person')->default(8)->after('hari');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket', function (Blueprint $table) {
            if (Schema::hasColumn('paket', 'max_person')) {
                $table->dropColumn('max_person');
            }
        });
    }
};
