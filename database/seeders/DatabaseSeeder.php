<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Ordem: Secretarias -> Escolas -> Educadores -> Alunos
            SecretariasSeeder::class,
            EscolasSeeder::class,
            EducadoresSeeder::class,
            AlunosSeeder::class,
        ]);
    }
}
