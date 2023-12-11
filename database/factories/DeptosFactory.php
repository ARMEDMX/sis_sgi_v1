<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deptos>
 */
class DeptosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => fake()->company(),
            'nombrecorto' => fake()->companySuffix(),
            'descripcion' => fake()->text($maxNbChars = 100),

        ];
    }
}
