<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('qwerty123'),
            'creator_id' => 1,
            'user_role_id' => DB::table('user_roles')->where('title', 'admin')->value('id')
        ]);

        User::factory()->create([
            'name' => 'Test Tutor',
            'email' => 'tutor@example.com',
            'password' => Hash::make('qwerty123'),
            'creator_id' => 1,
            'user_role_id' => DB::table('user_roles')->where('title', 'tutor')->value('id')
        ]);

        User::factory()->create([
            'name' => 'Test Agent',
            'email' => 'agent@example.com',
            'password' => Hash::make('qwerty123'),
            'creator_id' => 2,
            'user_role_id' => DB::table('user_roles')->where('title', 'agent')->value('id')
        ]);
    }
}
