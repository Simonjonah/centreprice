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
            $table->string('distributor_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('subvendor_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('subscription_id')->nullable(); // Payment related to a subscription
            $table->decimal('amount', 8, 2);
            $$table->json('subaccounts')->nullable();
            $table->string('status')->default('pending'); // Pending, paid, failed
          
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
