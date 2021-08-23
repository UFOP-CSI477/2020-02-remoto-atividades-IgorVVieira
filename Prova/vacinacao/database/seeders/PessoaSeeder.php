<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pessoa;

class PessoaSeeder extends Seeder
{
    public function run()
    {
        Pessoa::factory()->count(20)->create();
    }
}
