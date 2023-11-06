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
        Schema::create('mpesa_stk_pushes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('credentials_id')->nullable()->unsigned();
            $table->bigInteger('client_id')->nullable()->unsigned();
            $table->string('MerchantRequestID')->nullable();
            $table->string('CheckoutRequestID')->nullable();
            $table->string('ResponseCode')->nullable();
            $table->string('ResponseDescription')->nullable();
            $table->string('CustomerMessage')->nullable();
            $table->string('status')->nullable();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('credentials_id')->references('id')->on('mpesa_credentials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_stk_pushes');
    }
};
