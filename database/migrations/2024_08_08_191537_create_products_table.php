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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('root_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('franchise_id')->nullable();
            $table->string('subvendor_commission')->default('0')->nullable();
            $table->decimal('amount', 8, 2)->default('0')->nullable();
            // $table->decimal('franchise_commission', 8, 2)->default('0')->nullable();
            $table->decimal('distributors_commission', 8, 2)->default('0')->nullable();
            $table->decimal('vendors_commission', 8, 2)->default('0')->nullable();
            $table->decimal('percent', 8, 2)->default('0')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('quantity')->nullable();
            $table->string('package')->nullable();
            $table->string('package_no')->nullable();
            $table->text('images1')->nullable();
            $table->text('images2')->nullable();
            $table->text('images3')->nullable();
            $table->text('images4')->nullable();
            $table->text('images5')->nullable();
            $table->string('slug')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->json('subaccounts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
