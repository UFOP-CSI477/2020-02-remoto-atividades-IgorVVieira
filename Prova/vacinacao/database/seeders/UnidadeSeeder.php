<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    public function run()
    {
        Unidade::factory()->count(10)->create();
    }
}
