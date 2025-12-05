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
        Schema::create('paket_harga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('paket')->cascadeOnDelete();
            $table->string('keterangan');
            $table->integer('harga');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_harga');
    }
};
