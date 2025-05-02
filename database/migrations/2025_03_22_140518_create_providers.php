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
            $table->string('name_ar', 50)->index();
            $table->string('name_en', 50)->index();
            $table->string('description_ar', 400);
            $table->string('description_en' , 400);
            $table->string('license_number', 50);
            $table->boolean('verfication_status');
            $table->foreignId('user_id')->unique()->constrained();
            $table->foreignId('image_id')->nullable()->constrained();
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
