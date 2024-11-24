<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpeciesPopulationStatus;
use Illuminate\Support\Facades\DB;

class SpeciesPopulationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('species_population_statuses')->delete();

        SpeciesPopulationStatus::create(array(
            'title' => 'редкий',
            'description' => 'Вид был встречен 6-10 раз за все годы исследований.'
        ));

        SpeciesPopulationStatus::create(array(
            'title' => 'очень редкий',
            'description' => 'Вид был встречен 1-5 раз за все годы исследований.'
        ));

        SpeciesPopulationStatus::create(array(
            'title' => 'обычный',
            'description' => 'Вид встречается регулярно, но не ежедневно.'
        ));
    }
}
