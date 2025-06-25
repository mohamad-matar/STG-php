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
        Schema::create('tourist_trip', function (Blueprint $table) {
            $table->integer('seat_count')->nullable()->default(1);
            
            $table->enum('evaluate', [1, 2, 3, 4, 5])->nullable();

            $table->foreignId('tourist_id')->constrained();
            $table->foreignId('trip_id')->constrained();
            $table->primary(['tourist_id', 'trip_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_trip');
    }
};
