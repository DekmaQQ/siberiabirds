<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(SpeciesStatusSeeder::class);
        $this->call(SpeciesPopulationStatusSeeder::class);
        $this->call(BirdOrderSeeder::class);
        $this->call(BirdFamilySeeder::class);
        $this->call(BirdGenusSeeder::class);
        $this->call(BirdSpeciesSeeder::class);
        $this->call(BirdSpeciesSpeciesStatusSeeder::class);
        $this->call(UserRoleSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'creator_id' => 1,
            'user_role_id' => DB::table('user_roles')->where('title', 'admin')->value('id')
        ]);

        $this->call(BirdDetectionSeeder::class);
    }
}
