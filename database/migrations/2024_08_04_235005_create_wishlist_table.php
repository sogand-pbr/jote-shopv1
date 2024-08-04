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
        Schema::create('wishlist', function (Blueprint $table) {


            $table->foreignId('user_id')->nulable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('product_id')->nulable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


            $table->primary(['user_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
