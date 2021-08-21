<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{
    public function run()
    {
        Disciplina::create([
            'nome' => 'Fundamento de cálculo',
            'codigo' => 'CEA423',
            'periodo' => 1,
        ]);

        Disciplina::create([
            'nome' => 'Gestão da tecnologia da informação',
            'codigo' => 'CSI802',
            'periodo' => 7,
        ]);

        Disciplina::create([
            'nome' => 'Sistemas Web I',
            'codigo' => 'CSI606',
            'periodo' => 7,
        ]);

        Disciplina::create([
            'nome' => 'Banco de dados II',
            'codigo' => 'CSI603',
            'periodo' => 5,
        ]);

        Disciplina::create([
            'nome' => 'Programação de computadores I',
            'codigo' => 'CSI201',
            'periodo' => 1,
        ]);

        Disciplina::create([
            'nome' => 'Programação de computadores II',
            'codigo' => 'CSI202',
            'periodo' => 2,
        ]);
    }
}
