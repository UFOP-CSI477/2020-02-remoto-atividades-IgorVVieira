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
        $pessoas = Pessoa::get();
        $pessoaId = array_rand($pessoas->pluck('id'));

        $vacinas = Vacina::selectRaw('id')->get();
        $vacinaId = array_rand($vacinas->pluck('id'));

        $unidades = Unidade::selectRaw('id')->get();
        $unidadeId = array_rand($unidades->pluck('id'));

        return [
            'pessoa_id' => $pessoas[$pessoaId],
            'unidade_id' => $unidades[$unidadeId],
            'vacina_id' => $vacinas[$vacinaId],
            'dose' => rand(0, 4),
            'data' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = now(), $timezone = null),
        ];
    }
}
