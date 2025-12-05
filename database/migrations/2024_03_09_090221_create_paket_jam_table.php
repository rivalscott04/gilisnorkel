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
        if (!Schema::hasTable('paket_jam')) {
            Schema::create('paket_jam', function (Blueprint $table) {
                $table->id();
                $table->foreignId('paket_id')->constrained('paket')->cascadeOnDelete();
                $table->foreignId('jam_id')->constrained("jam");
                $table->boolean('is_active')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_jam');
    }
};
