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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('type');
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_icon')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
