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
        Schema::create('subaccounts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('subaccount_code')->unique();
            $table->string('business_name');
            $table->string('settlement_bank');
            $table->string('account_number');
            $table->string('percentage_charge', 8, 2)->nullable();
            $table->decimal('share', 8, 2)->nullable(); // Percentage share
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subaccounts');
    }
};
