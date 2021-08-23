<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PessoaSeeder::class,
            UnidadeSeeder::class,
            VacinaSeeder::class,
            RegistroSeeder::class,
        ]);
    }
}
