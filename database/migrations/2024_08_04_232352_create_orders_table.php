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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('address_id');
            $table->foreign('address_id')->references('id')->on('user_addresses')->onDelete('cascade');

            $table->foreignId('coupon_id')->nulable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');

            $table->tinyInteger('status')->default(0);
            $table->unsignedTinyInteger('total_amount');
            $table->unsignedTinyInteger('delivery_amount')->default(0);
            $table->unsignedTinyInteger('coupon_amount')->default(0);
            $table->unsignedTinyInteger('paying_amount');
            $table->enum('payment_type', ['pos', 'cash', 'shabanumber' , 'cardtocard' , 'online'])->default('paypal');
            $table->tinyInteger('payment_status')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
