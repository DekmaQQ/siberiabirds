<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpeciesStatus;
use Illuminate\Support\Facades\DB;

class SpeciesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpeciesStatus::create(array(
            'title' => 'залётный',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'гнездящийся',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'редкий',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'оседлый',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'перелетный',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'обычный',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'местами редкий',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'местами обычный',
            // 'description' => ''
        ));

        SpeciesStatus::create(array(
            'title' => 'отдельные особи редко остаются зимовать',
            // 'description' => ''
        ));
    }
}
