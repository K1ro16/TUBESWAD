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
        Schema::table('eventreq', function (Blueprint $table) {
            $table->string('category')->after('penyelenggara')->nullable(); // Add the category column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventreq', function (Blueprint $table) {
            $table->dropColumn('category'); // Remove the category column
        });
    }
};
