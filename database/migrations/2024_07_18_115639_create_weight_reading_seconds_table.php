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
        Schema::create('weight_reading_seconds', function (Blueprint $table) {
            $table->id();
            $table->string('readingId');
            $table->float('weight');
            $table->string('accountName')->nullable();
            $table->string('sourceName')->nullable();
            $table->string('driverName')->nullable();
            $table->string('commodityName')->nullable();
            $table->string('destinationName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_reading_seconds');
    }
};
