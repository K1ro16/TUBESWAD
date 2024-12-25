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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event', 50); // Panjang 100 lebih umum untuk nama
            $table->text('deskripsi'); // Menggunakan text untuk deskripsi yang panjang
            $table->string('lokasi', 100); // Panjang lebih besar untuk fleksibilitas
            $table->string('waktu', 50); // Misalnya, waktu dalam format string (hh:mm atau full date)
            $table->integer('harga'); // Harga sebagai integer
            $table->foreignId('community_id')->constrained('communities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
