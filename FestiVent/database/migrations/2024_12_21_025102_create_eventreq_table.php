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
        Schema::create('eventreq', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi');
            $table->string('poster'); // Added column for storing image file names
            $table->text('lokasi');
            $table->timestamp('waktu'); // Changed to timestamp for date & time storage
            $table->date('tanggal'); // Added column for storing date
            $table->integer('harga'); // Fixed typo from interger to integer
            $table->string('penyelenggara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventreq');
    }
};
