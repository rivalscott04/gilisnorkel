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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->foreignId('paket_id');
            $table->string('nama',100);
            $table->string('nomor_telp',15);
            $table->string('email');
            $table->date('tgl_kedatangan');
            $table->integer('harga');
            $table->enum('status',['unpaid','paid','ongoing','finish','cancel'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
