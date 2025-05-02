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
        Schema::create('place_evaluates', function (Blueprint $table) {
            $table->id();
            $table->enum('evaluate', [1,2,3,4,5]);
            $table->foreignId('tourist_id')->constrained();
            $table->foreignId('place_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_evaluates');
    }
};
