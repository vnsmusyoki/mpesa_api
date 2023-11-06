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
        Schema::create('mpesa_credentials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->nullable()->unsigned();
            $table->string('consumer_key')->nullable();
            $table->string('short_code')->nullable();
            $table->string('consumer_secret')->nullable();
            $table->string('pass_key')->nullable();
            $table->string('call_back_url')->nullable();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_credentials');
    }
};
