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
        Schema::create('provider_branch_shows', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 50)->index();
            $table->string('name_en', 50)->index();

            $table->foreignId('provider_branch_id')->constrained();
            $table->foreignId('image_id')->nullable()->constrained()->onDelete('set null');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_branch_shows');
    }
};
