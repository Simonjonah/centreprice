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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('milestone_id')->nullable();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('lga')->nullable();
            $table->string('districts')->nullable();
            $table->string('state')->nullable();
            $table->string('lga_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('ngstate_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('subscription')->nullable();
            $table->float('bonuse')->default(0)->nullable();
            $table->float('withdrawal')->default(0)->nullable();
            $table->float('deposit')->default(0)->nullable();
            $table->string('images')->nullable();

            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
