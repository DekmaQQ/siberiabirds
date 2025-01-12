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
        /**
         * Таблица статусов видов птиц.
         */
        Schema::create('species_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255)
                  ->unique();
            $table->text('description')
                  ->nullable(true);
        });

        /**
         * Таблица статусов популяции видов птиц.
         */
        Schema::create('species_population_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255)
                  ->unique();
            $table->text('description')
                  ->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species_statuses');
        Schema::dropIfExists('species_population_statuses');
    }
};
