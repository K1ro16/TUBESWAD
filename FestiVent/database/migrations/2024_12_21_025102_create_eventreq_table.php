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
            $table->string('deskripsi');
            $table->string('lokasi');
            $table->string('waktu');
            $table->string('harga');
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
