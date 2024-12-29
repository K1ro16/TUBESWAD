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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accounts_id');
            $table->unsignedBigInteger('eventreq_id');
            $table->timestamps();
            
            $table->foreign('accounts_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('eventreq_id')->references('id')->on('eventreq')->onDelete('cascade');
            
            $table->unique(['accounts_id', 'eventreq_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
