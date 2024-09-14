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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('franchise_id')->nullable();
            $table->string('distributor_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->decimal('requested_amount')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->decimal('franchise_commission', 8, 2)->nullable();
            $table->decimal('distributors_commission', 8, 2)->nullable();
            $table->decimal('vendors_commission', 8, 2)->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('reference')->nullable();
            $table->string('productname')->nullable();
            $table->string('paidAt')->nullable();
            $table->string('domain')->nullable();
            $table->string('gateway_response')->nullable();
            $table->string('channel')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('fees')->nullable();
            $table->string('risk_action')->nullable();
            $table->string('international_format_phone')->nullable();
            $table->string('split_id')->nullable();
            $table->string('name')->nullable();
            $table->string('split_code')->nullable();
            $table->string('type')->nullable();
            $table->string('bearer_type')->nullable();
            $table->string('bearer_subaccount')->nullable();
            // $table->string('original_share')->nullable();
            $table->string('split_fees')->nullable();
            $table->string('share')->nullable();
            $table->string('subaccount_code')->nullable();
            $table->string('subaccount_id')->nullable();
            $table->string('subaccount_name')->nullable();
            $table->string('integration')->nullable();
            $table->string('paystack')->nullable();
            $table->string('subaccount_amount')->nullable();
            $table->string('original_share')->nullable();
            $table->string('shere_fees')->nullable();
            $table->string('shere_subaccount_code')->nullable();
            $table->string('shere_id')->nullable();
            $table->string('share_integration')->nullable();
            $table->string('status')->default('pending');
            $table->string('quantity')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('images1')->nullable();
            $table->string('images2')->nullable();
            $table->string('images3')->nullable();
            $table->string('images4')->nullable();
            $table->string('images5')->nullable();
            $table->string('productstatus')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
