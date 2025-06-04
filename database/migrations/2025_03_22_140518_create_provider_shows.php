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
        Schema::create('provider_shows', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 50)->index();
            $table->string('name_en', 50)->index();
            $table->string('description_ar', 400)->nullable();
            $table->string('description_en' , 400)->nullable();

            $table->foreignId('provider_id')->constrained();
            $table->foreignId('image_id')->nullable()->constrained()->onDelete('set null');;
           
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
        Schema::dropIfExists('provider_shows');
    }
};
