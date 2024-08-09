<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\District;
use App\Models\Ngstate;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lgas', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Ngstate::class)->constrained('ngstates')->onDelete('cascade')->update('cascade');
            // $table->foreignIdFor(District::class)->constrained('districts')->onDelete('cascade')->update('cascade');

            $table->string('district_id')->nullable();
            $table->string('ngstate_id')->nullable();
            $table->string('state')->nullable();
            $table->string('districts')->nullable();
            $table->string('lga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lgas');
    }
};
