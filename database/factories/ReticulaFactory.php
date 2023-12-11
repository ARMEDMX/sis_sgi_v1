<?php

namespace Database\Factories;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;


class ReticulaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'descripcion' => fake()->catchPhrase(),
            'fechaenvigor' => fake()->date(),
            'carrera_id'=>Carrera::factory()
        ];
    }
}
