<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory
{
    protected $model = Pessoa::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'bairro' => $this->faker->city(),
            'cidade' => $this->faker->state(),
            'data_nascimento' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = null),
        ];
    }
}
