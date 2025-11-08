<?php

namespace Database\Seeders;

use App\Models\Educador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EducadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educadores = [
            [
                'email' => 'igor@example.com',
                'cpf' => '12489723413',
                'telefone' => '(11) 90000-0001',
                'disciplina' => 'Matemática',
                'turno' => 'Manhã',
            ],
            [
                'email' => 'rian@example.com',
                'cpf' => '98765432100',
                'telefone' => '(11) 90000-0002',
                'disciplina' => 'Português',
                'turno' => 'Tarde',
            ],
        ];

        foreach ($educadores as $dados) {
            Educador::updateOrCreate(
                ['cpf' => $dados['cpf']],
                array_merge($dados, [
                    'senha' => Hash::make('12345'),
                ])
            );
        }
    }
}
