<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugares>
 */
class LugaresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreLugar' => fake()->city(),
            'descripcion' => fake()->text($maxNbChars = 100),
            'edificio' => fake()->buildingNumber(),
        ];
    }
}
