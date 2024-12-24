<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            SpeciesStatusSeeder::class,
            SpeciesPopulationStatusSeeder::class,
            BirdOrderSeeder::class,
            BirdFamilySeeder::class,
            BirdGenusSeeder::class,
            BirdSpeciesSeeder::class,
            BirdSpeciesSpeciesStatusSeeder::class,
            UserRoleSeeder::class,
            UserSeeder::class,
            BirdDetectionSeeder::class
        ]);
    }
}
