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
        $pessoas = Pessoa::all()->pluck('id')->all();
        $vacinas = Vacina::all()->pluck('id')->all();
        $unidades = Unidade::all()->pluck('id')->all();

        return [
            'pessoa_id' => $this->faker->randomElement($pessoas),
            'unidade_id' => $this->faker->randomElement($unidades),
            'vacina_id' => $this->faker->randomElement($vacinas),
            'dose' => $this->faker->randomElement([0, 1, 2, 3, 4]),
            'data' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = now(), $timezone = null),
        ];
    }
}
