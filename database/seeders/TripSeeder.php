<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Trip;

// Helpers
use Illuminate\Support\Facades\Schema;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Trip::truncate();
        });

        for ($i=0; $i < 20; $i++) { 
            $trip = Trip::create([
                'destination' => fake()->city(),
                'img_destination' => 'https://picsum.photos/600/300',
                'departure_date' => fake()->date(),
                'arrival_date' => fake()->date(),
                'num_people' => fake()->randomDigit(),
                'transport' => 'auto',
                'price' => fake()->randomFloat(2, 0, 999),
                'reservation' => fake()->boolean(50),
                'food' => fake()->sentence(10),
                'notes' => fake()->sentence(10),
                'travel_completed' => fake()->boolean(50),
            ]);
        }
    }
}
