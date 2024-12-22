<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BirdDetection;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class BirdDetectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        DB::table('bird_detections')->delete();

        BirdDetection::create(array(
            'agent_id' => DB::table('users')->where('email', 'test@example.com')->value('id'),
            'bird_species_id' => DB::table('bird_species')->where('title', 'Украшенный чибис')->value('id'),
            'latitude' => 52.09141,
            'longitude' => 108.6377,
            'detection_timestamp' => $faker->dateTime(),
            // 'comment' => ,
            'confirmed' => true
        ));

        BirdDetection::create(array(
            'agent_id' => DB::table('users')->where('email', 'test@example.com')->value('id'),
            'bird_species_id' => DB::table('bird_species')->where('title', 'Украшенный чибис')->value('id'),
            'latitude' => 51.642959,
            'longitude' => 107.714601,
            'detection_timestamp' => $faker->dateTime(),
            // 'comment' => ,
            'confirmed' => true
        ));

        BirdDetection::create(array(
            'agent_id' => DB::table('users')->where('email', 'test@example.com')->value('id'),
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский бекасовидный веретенник')->value('id'),
            'latitude' => 54.72181,
            'longitude' => 110.7851,
            'detection_timestamp' => $faker->dateTime(),
            // 'comment' => ,
            'confirmed' => true
        ));

        BirdDetection::create(array(
            'agent_id' => DB::table('users')->where('email', 'test@example.com')->value('id'),
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский бекасовидный веретенник')->value('id'),
            'latitude' => 54.0565,
            'longitude' => 111.180,
            'detection_timestamp' => $faker->dateTime(),
            // 'comment' => ,
            'confirmed' => true
        ));

        BirdDetection::create(array(
            'agent_id' => DB::table('users')->where('email', 'test@example.com')->value('id'),
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский конек')->value('id'),
            'latitude' => 53.789558,
            'longitude' => 109.78127,
            'detection_timestamp' => $faker->dateTime(),
            // 'comment' => ,
            'confirmed' => true
        ));

        BirdDetection::create(array(
            'agent_id' => DB::table('users')->where('email', 'test@example.com')->value('id'),
            'bird_species_id' => DB::table('bird_species')->where('title', 'Американский конек')->value('id'),
            'latitude' => 53.7522,
            'longitude' => 109.83620,
            'detection_timestamp' => $faker->dateTime(),
            // 'comment' => ,
            'confirmed' => true
        ));
    }
}
