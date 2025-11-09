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
            AnexosSeeder::class,
            ResponsaveisSeeder::class,
            DiagnosticosSeeder::class,
            InventarioHabilidadesSeeder::class,
            HabilidadesSeeder::class,
            OrientacoesPedagogicasSeeder::class,
            MetasSeeder::class,
            EntrevistasFamiliaresSeeder::class,
            PlanejamentosSeeder::class,
            RegistrosPedagogicosSeeder::class,
        ]);
    }
}
