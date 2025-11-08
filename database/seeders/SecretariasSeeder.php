<?php

namespace Database\Seeders;

use App\Models\Secretaria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SecretariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secretarias = [
            [
                'nome' => 'Secretaria Municipal de Educação de São Paulo',
                'email' => 'secretaria@sao-paulo.sp.gov.br',
                'password' => Hash::make('12345'),
                'ativo' => true,
                'latitude' => -23.5505,
                'longitude' => -46.6333,
            ],
            [
                'nome' => 'Secretaria Municipal de Educação do Rio de Janeiro',
                'email' => 'secretaria@rio-de-janeiro.rj.gov.br',
                'password' => Hash::make('12345'),
                'ativo' => true,
                'latitude' => -22.9068,
                'longitude' => -43.1729,
            ],
            [
                'nome' => 'Secretaria Municipal de Educação de Belo Horizonte',
                'email' => 'secretaria@belo-horizonte.mg.gov.br',
                'password' => Hash::make('12345'),
                'ativo' => true,
                'latitude' => -19.9167,
                'longitude' => -43.9345,
            ],
            [
                'nome' => 'Secretaria Municipal de Educação de Brasília',
                'email' => 'secretaria@brasilia.df.gov.br',
                'password' => Hash::make('12345'),
                'ativo' => true,
                'latitude' => -15.8267,
                'longitude' => -47.9218,
            ],
            [
                'nome' => 'Secretaria Municipal de Educação de Curitiba',
                'email' => 'secretaria@curitiba.pr.gov.br',
                'password' => Hash::make('12345'),
                'ativo' => true,
                'latitude' => -25.4284,
                'longitude' => -49.2733,
            ],
        ];

        foreach ($secretarias as $secretaria) {
            Secretaria::create($secretaria);
        }
    }
}
