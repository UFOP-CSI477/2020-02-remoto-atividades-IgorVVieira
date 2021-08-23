<?php

namespace Database\Factories;

use App\Models\Vacina;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    protected $model = Vacina::class;

    public function definition()
    {
        $arrayNome = ['CoronaVac', 'AstraZeneca', 'SpiN-Tec', 'Janssen', 'Pfizer'];
        $nome = array_rand($arrayNome);

        $arrayFabricante = ['Sinovac', 'Pfizer', 'Oxford', 'Janssen Farmacêutica'];
        $fabricante = array_rand($arrayFabricante);
        
        return [
            'nome' => $arrayNome[$nome],
            'fabricante' => $arrayFabricante[$fabricante],
            'doses' => rand(1000, 5000),
        ];
    }
}
