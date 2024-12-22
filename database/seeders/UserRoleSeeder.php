<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::create(array(
            'title' => 'admin'
        ));

        UserRole::create(array(
            'title' => 'tutor' // куратор
        ));
        
        UserRole::create(array(
            'title' => 'agent'
        ));
    }
}
