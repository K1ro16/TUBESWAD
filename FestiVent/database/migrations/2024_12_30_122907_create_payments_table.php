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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_tlp');
            $table->string('email');
            $table->integer('jml_tiket');
            $table->decimal('harga', 10, 2);
            $table->string('opsi_pay');
            $table->unsignedBigInteger('eventreq_id');
            $table->unsignedBigInteger('kode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
