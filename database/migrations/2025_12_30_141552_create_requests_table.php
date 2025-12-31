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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('tourist_name')->nullable();
            $table->string('tourist_nationality')->nullable();
            $table->string('tourist_phone')->nullable();
            $table->string('airport_name')->nullable();
            $table->dateTime('arrival_time')->nullable();
            $table->dateTime('departure_time')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('driver_id')->constrained('drivers')->nullable();
            $table->json('trip_plan_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
