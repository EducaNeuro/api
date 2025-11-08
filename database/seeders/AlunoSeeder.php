<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $secretariaId = DB::table('secretarias')->value('id');

        if (! $secretariaId) {
            $secretariaId = DB::table('secretarias')->insertGetId([
                'nome' => 'Secretaria Municipal de Educação',
                'ativo' => true,
                'latitude' => -23.550520,
                'longitude' => -46.633308,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $escolaId = DB::table('escolas')->value('id');

        if (! $escolaId) {
            $escolaId = DB::table('escolas')->insertGetId([
                'nome' => 'Escola Municipal Aprender',
                'secretaria_id' => $secretariaId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $alunos = [
            [
                'nome' => 'Ana Clara Souza',
                'idade' => 10,
                'escolaridade' => '4º ano do fundamental',
                'turno' => 'Manhã',
                'turma' => '4A',
            ],
            [
                'nome' => 'Bruno Henrique Lima',
                'idade' => 11,
                'escolaridade' => '5º ano do fundamental',
                'turno' => 'Tarde',
                'turma' => '5B',
            ],
            [
                'nome' => 'Carolina Mendes',
                'idade' => 9,
                'escolaridade' => '3º ano do fundamental',
                'turno' => 'Integral',
                'turma' => '3C',
            ],
        ];

        foreach ($alunos as $aluno) {
            DB::table('alunos')->updateOrInsert(
                [
                    'nome' => $aluno['nome'],
                    'turma' => $aluno['turma'],
                ],
                array_merge($aluno, [
                    'escola_id' => $escolaId,
                    'updated_at' => $now,
                    'created_at' => $now,
                ])
            );
        }
    }
}
