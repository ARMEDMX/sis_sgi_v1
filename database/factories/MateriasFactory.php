<?php

namespace Database\Factories;

use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materias>
 */
class MateriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreMateria' => fake()->domainWord(), // Ejemplo de sentencia de 3 palabras
            'nivel' => fake()->randomElement(['A', 'B', 'C', 'D']), // Niveles A, B, C o D
            'nombreMediano' => fake()->word(), // Una sola palabra
            'nombreCorto' => fake()->countryCode(), // Una sola palabra
            'modalidad' => fake()->randomElement(['P', 'V', 'S']), // Modalidades P, V o S
            'reticula_id' => Reticula::factory()
        ];
    }
}
