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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar', 100);
            $table->string('title_en', 100);
            
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            
            $table->integer('count');
            $table->decimal('cost' , 10 ,2);
            
            $table->string('note', 1000)->nullable();
            $table->foreignId('provider_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
