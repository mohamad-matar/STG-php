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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 100)->index()->nullable();
            $table->string('name_en', 100)->index()->nullable();;
            $table->string('description_ar', 400)->nullable();;
            $table->string('description_en' , 400)->nullable();;
            $table->string('license_number', 50)->nullable();;
            
            $table->boolean('accepted')->default(false);
            
            $table->foreignId('user_id')->unique()->constrained();
            $table->foreignId('image_id')->nullable()->constrained();
            
            $table->foreignId('province_id')->constrained();
            $table->foreignId('place_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
