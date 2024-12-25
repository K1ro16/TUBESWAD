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
            $table->string('poster')->nullable(); // Add the poster column
            $table->date('tanggal')->nullable(); // Add the tanggal column
            $table->timestamp('waktu')->nullable()->change(); // Change waktu to timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventreq', function (Blueprint $table) {
            $table->dropColumn('poster'); // Remove the poster column
            $table->dropColumn('tanggal'); // Remove the tanggal column
            $table->string('waktu')->change(); // Revert waktu to string
        });
    }
};
