<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BirdSpeciesSpeciesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bird_species_species_status')->delete();

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Украшенный чибис')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'залётный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская галка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'гнездящийся')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская галка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская галка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'оседлый')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекас')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'перелетный')->value('id')
        ]);
        
        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекас')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'гнездящийся')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекас')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'обычный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекас')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'местами редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекасовидный веретенник')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'местами обычный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекасовидный веретенник')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'перелетный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Азиатский бекасовидный веретенник')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Алтайский улар')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская завирушка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'перелетный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская завирушка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'гнездящийся')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская завирушка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'отдельные особи редко остаются зимовать')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская завирушка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Альпийская завирушка')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'местами обычный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский бекасовидный веретенник')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'залётный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский конек')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'перелетный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский конек')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'гнездящийся')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский конек')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Амурский кобчик')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'перелетный')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Амурский кобчик')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'гнездящийся')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Амурский кобчик')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);

        DB::table('bird_species_species_status')->insert([
            'bird_species_id' => DB::table('bird_species')->where('title', 'Балобан')->value('id'),
            'species_status_id' => DB::table('species_statuses')->where('title', 'редкий')->value('id')
        ]);
    }
}
