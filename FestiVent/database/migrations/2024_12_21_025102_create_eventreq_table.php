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
            $table->text('lokasi');
            $table->integer('harga');
            $table->string('penyelenggara');
            $table->string('poster'); // Add the poster column
            $table->date('tanggal'); // Add the tanggal column
            $table->time('waktu')->nullable(); // Change this line if it was different
            $table->string('category'); // Add the category column
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
