<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Ngstate;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Ngstate::class)->constrained('ngstates')->onDelete('cascade')->update('cascade');
            $table->string('ngstate_id')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('lga_id')->nullable();
            $table->string('districts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
