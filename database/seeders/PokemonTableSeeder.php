<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pokemon::create([
            'name' => 'Pikachu',
            'type' => 'Electric',
            'level' => 10,
            'hp' => 35,
            'attack' => 55,
            'defense' => 40,
            'speed' => 90,
        ]);

        Pokemon::create([
            'name' => 'Charmander',
            'type' => 'Fire',
            'level' => 12,
            'hp' => 39,
            'attack' => 52,
            'defense' => 43,
            'speed' => 65,
        ]);

        Pokemon::create([
            'name' => 'Squirtle',
            'type' => 'Water',
            'level' => 11,
            'hp' => 44,
            'attack' => 48,
            'defense' => 65,
            'speed' => 43,
        ]);

        Pokemon::create([
            'name' => 'Bulbasaur',
            'type' => 'Grass/Poison',
            'level' => 13,
            'hp' => 45,
            'attack' => 49,
            'defense' => 49,
            'speed' => 45,
        ]);

        Pokemon::create([
            'name' => 'Jigglypuff',
            'type' => 'Normal/Fairy',
            'level' => 8,
            'hp' => 115,
            'attack' => 45,
            'defense' => 20,
            'speed' => 20,
        ]);

        Pokemon::factory(100)->create();
    }
}
