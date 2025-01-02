<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlist_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('accounts_id');
            $table->timestamps();
            
            $table->foreign('accounts_id')->references('id')->on('accounts')->onDelete('cascade');
        });
        
        // Add group_id to existing wishlists table
        Schema::table('wishlists', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('wishlist_groups')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropColumn('group_id');
        });
        Schema::dropIfExists('wishlist_groups');
    }
};