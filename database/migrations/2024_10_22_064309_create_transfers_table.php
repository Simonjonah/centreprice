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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('recipient_code')->unique();  // Code of the recipient
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('bank_name');
            $table->string('account_number');

            $table->string('subaccount_code')->unique()->nullable();
            $table->string('business_name')->nullable();
            $table->string('settlement_bank')->nullable();
            $table->string('percentage_charge', 8, 2)->nullable();
            $table->decimal('share', 8, 2)->nullable(); 
            $table->decimal('amount', 8, 2)->nullable(); 
            $table->decimal('balance', 8, 2)->nullable(); 
            $table->string('transactions')->nullable();
            $table->string('subscriptions')->nullable();
            $table->string('authorizations')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('integration')->nullable();
            $table->string('domain')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('risk_action')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('createdAt')->nullable();
            $table->string('updatedAt')->nullable();
            $table->string('identified')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('account_name')->nullable();
            $table->string('assigned')->nullable();
            $table->string('currency')->nullable();
            $table->string('active')->nullable();
            $table->string('virtual_account_id')->nullable();
            $table->string('assignee_id')->nullable();
            $table->string('assignee_type')->nullable();
            $table->string('expired')->nullable();
            $table->string('account_type')->nullable();
            $table->string('assigned_at')->nullable();
            $table->string('expired_at')->nullable();
            $table->string('assignment_expires_at')->nullable();
            $table->string('international_format_phone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
