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
        Schema::create('bird_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 255)
                  ->unique();
            $table->char('title_latin', 255)
                  ->unique();
            $table->text('description')
                  ->nullable(true);
        });

        Schema::create('bird_families', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 255)
                  ->unique();
            $table->char('title_latin', 255)
                  ->unique();
            $table->text('description')
                  ->nullable(true);
            $table->foreignId('bird_order_id')
                  ->constrained();
        });

        Schema::create('bird_genera', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 255)
                  ->unique();
            $table->char('title_latin', 255)
                  ->unique();
            $table->text('description')
                  ->nullable(true);
            $table->foreignId('bird_family_id')
                  ->constrained();
        });

        Schema::create('bird_species', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 255)
                  ->unique();
            $table->char('title_latin', 255)
                  ->unique();
            $table->text('description')
                  ->nullable(true);
            $table->text('distribution')
                  ->nullable(true);
            $table->text('migration')
                  ->nullable(true);
            $table->text('habitat')
                  ->nullable(true);
            $table->foreignId('bird_genus_id')
                  ->constrained(table: 'bird_genera');
            $table->foreignId('species_population_status_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
        });

        Schema::create('bird_species_species_status', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('bird_species_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->foreignId('species_status_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->primary(['bird_species_id', 'species_status_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('bird_species_species_status');
      Schema::dropIfExists('bird_species');
      Schema::dropIfExists('bird_genera');
      Schema::dropIfExists('bird_families');
      Schema::dropIfExists('bird_orders');
    }
};
