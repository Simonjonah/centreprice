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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('franchise_id')->nullable();
            $table->string('distributor_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('subscription_id')->nullable();
            $table->string('subvendor_id')->nullable();
            $table->string('subaccounts')->nullable();
            $table->string('status')->default('pending'); 
            $table->text('amount')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('user_type')->nullable(); 
            $table->string('fname')->nullable(); 
            $table->string('lname')->nullable(); 
            $table->string('reference')->nullable(); 
            $table->string('currency')->nullable(); 
            $table->string('channels')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
