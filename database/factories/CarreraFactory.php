<?php

namespace Database\Factories;

use App\Models\Deptos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrera>
 */
class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'nombrecorto' => fake()->companySuffix(),
            'deptos_id'=>Deptos::factory()
        ];
    }
}
