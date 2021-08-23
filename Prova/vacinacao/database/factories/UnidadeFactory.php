<?php

namespace Database\Factories;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadeFactory extends Factory
{
    protected $model = Unidade::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company(),
            'bairro' => $this->faker->city(),
            'cidade' => $this->faker->state(),
        ];
    }
}
