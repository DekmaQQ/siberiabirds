<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            UserRoleSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('qwerty123'),
            'creator_id' => 1,
            'user_role_id' => DB::table('user_roles')->where('title', 'admin')->value('id')
        ]);

        $this->call(BirdDetectionSeeder::class);
    }
}
