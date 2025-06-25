2<?php

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
            Schema::create('countries',  function (Blueprint $table) {
                $table->id();
                $table->char('code',2);
                $table->string('name_ar', 50)->unique();
                $table->string('name_en', 50)->unique();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::drop('countries');
        }
    };
