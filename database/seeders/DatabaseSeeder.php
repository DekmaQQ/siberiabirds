<?php

namespace Database\Seeders;

use App\Models\BirdDetection;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        $this->call(SpeciesStatusSeeder::class);
        $this->call(SpeciesPopulationStatusSeeder::class);
        $this->call(BirdOrderSeeder::class);
        $this->call(BirdFamilySeeder::class);
        $this->call(BirdGenusSeeder::class);
        $this->call(BirdSpeciesSeeder::class);
        $this->call(BirdSpeciesStatusesSeeder::class);
        $this->call(BirdDetectionSeeder::class);
    }
}
