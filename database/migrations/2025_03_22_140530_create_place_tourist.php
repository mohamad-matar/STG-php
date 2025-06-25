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
        Schema::create('place_tourist', function (Blueprint $table) {
            $table->enum('evaluate', [1,2,3,4,5]);
            $table->foreignId('tourist_id')->constrained();
            $table->foreignId('place_id')->constrained();
            $table->primary(['tourist_id', 'place_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_tourist');
    }
};
