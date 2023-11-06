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
        Schema::create('mpesa_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('credentials_id')->nullable()->unsigned();
            $table->bigInteger('client_id')->nullable()->unsigned();
            $table->string('order_id')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('ResultCode')->nullable();
            $table->string('mpesa_amount')->nullable();
            $table->string('MpesaReceiptNumber')->nullable();
            $table->string('MpesaPayNumber')->nullable();
            $table->string('TransactionDate')->nullable();
            $table->string('MpesaPaymentTimestamp')->nullable();
            $table->string('TransactionID')->nullable();
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
        Schema::dropIfExists('mpesa_payments');
    }
};
