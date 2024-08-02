<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Place;
use App\Models\Trip;

// Helpers
use Illuminate\Support\Facades\Schema;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Place::truncate();
        });

        for ($i=0; $i < 10; $i++) { 
            $place = Place::create([
                'trip_id' => Trip::inRandomOrder()->first()->id,
                'name' => ucfirst(fake()->word()),
                'img_place' => 'https://picsum.photos/600/300',
                'description' => fake()->sentence(10),
                'hour' => fake()->time(),
                'cost' => fake()->randomFloat(2, 0, 29),
                'priority' => 'media',
                'review' => rand(0, 5) ,
                'visited' => fake()->boolean(50),
            ]);
        }
    }
}
