<?php

namespace Database\Factories;

use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Pessoa, Vacina, Unidade};

class RegistroFactory extends Factory
{
    protected $model = Registro::class;

    public function definition()
    {
        return [
            'pessoa_id' => Pessoa::all()->random()->id,
            'unidade_id' => Unidade::all()->random()->id,
            'vacina_id' => Vacina::all()->random()->id,
            'dose' => $this->faker->randomElement([0, 1, 2, 3, 4]),
            'data' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = now(), $timezone = null),
        ];
    }
}
