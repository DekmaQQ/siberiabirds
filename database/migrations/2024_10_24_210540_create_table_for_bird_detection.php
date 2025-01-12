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
         * Таблица фиксаций птиц.
         */
        Schema::create('bird_detections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('agent_id')
                  ->constrained('users');
            $table->foreignId('bird_species_id')
                  ->constrained();
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->dateTime('detection_datetime');
            $table->text('comment')
                  ->nullable(true);
            $table->boolean('confirmed')
                  ->default(false);
            $table->unique(['bird_species_id', 'latitude', 'longitude', 'detection_datetime'], 'bird_detection_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bird_detections');
    }
};
