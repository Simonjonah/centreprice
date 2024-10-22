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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('code')->nullable();
            $table->string('longcode')->nullable();
            $table->string('gateway')->nullable();
            $table->string('pay_with_bank')->nullable();
            $table->string('supports_transfer')->nullable();
            $table->string('active')->nullable();
            $table->string('country')->nullable();
            $table->string('currency')->nullable();
            $table->string('type')->nullable();
            $table->string('is_deleted')->nullable();
            $table->string('createdAt')->nullable();
            $table->string('updatedAt')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
