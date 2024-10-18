<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Nama Pokémon
            'type' => $this->faker->randomElement(['Electric', 'Fire', 'Water', 'Grass', 'Normal', 'Fairy', 'Poison']), // Tipe Pokémon
            'level' => $this->faker->numberBetween(1, 100), // Level Pokémon
            'hp' => $this->faker->numberBetween(10, 200), // Hit Points
            'attack' => $this->faker->numberBetween(10, 150), // Serangan
            'defense' => $this->faker->numberBetween(10, 150), // Pertahanan
            'speed' => $this->faker->numberBetween(10, 150), // Kecepatan
        ];
    }
}
