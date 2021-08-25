<?php

namespace Database\Factories;

use App\Models\Vacina;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    protected $model = Vacina::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->randomElement(['CoronaVac', 'AstraZeneca', 'SpiN-Tec', 'Janssen', 'Pfizer']),
            'fabricante' => $this->faker->randomElement(['Sinovac', 'Pfizer', 'Oxford', 'Janssen Farmacêutica']),
            'doses' => rand(1000, 5000),
        ];
    }
}
