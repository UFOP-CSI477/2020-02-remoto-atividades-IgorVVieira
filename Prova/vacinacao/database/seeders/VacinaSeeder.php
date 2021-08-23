<?php

namespace Database\Seeders;

use App\Models\Vacina;
use Illuminate\Database\Seeder;

class VacinaSeeder extends Seeder
{
    public function run()
    {
        Vacina::factory()->count(5)->create();
    }
}
