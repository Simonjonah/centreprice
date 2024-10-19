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
            $table->string('subvendor_id')->nullable();
            
            $table->string('user_type')->nullable();
            $table->string('reference')->nullable();
            $table->text('amount')->nullable();
            $table->string('user_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('distributor_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('ref_no2')->nullable();
            $table->string('ref_no3')->nullable();
            $table->string('ref_no4')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('dob')->nullable();
            $table->float('subscription_fee')->nullable();
            $table->string('email')->unique();
            $table->string('lga')->nullable();
            $table->string('districts')->nullable();
            $table->string('state')->nullable();
            $table->string('lga_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('ngstate_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('subscription')->nullable();
            $table->decimal('bonuse', 8, 2)->default(0)->nullable();
            $table->decimal('withdrawal', 8, 2)->default(0)->nullable();
            $table->decimal('deposit', 8, 2)->default(0)->nullable();
            $table->string('images')->nullable();
            $table->string('terms')->nullable();
            $table->string('distributor_email')->nullable();
            $table->string('vendor_email')->nullable();
            // $table->string('terms')->nullable();
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
