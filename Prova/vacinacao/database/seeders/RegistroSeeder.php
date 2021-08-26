<?php

namespace Database\Seeders;

use App\Models\Registro;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    public function run()
    {
        Registro::factory()->count(10)->create();
    }
}
