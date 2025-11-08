<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nomes = [
            'Gabriel Silva Santos',
            'Maria Eduarda Oliveira',
            'João Pedro Costa',
            'Ana Julia Ferreira',
            'Lucas Henrique Souza',
            'Sophia Martins Lima',
            'Miguel Alves Pereira',
            'Alice Rodrigues Almeida',
            'Arthur Santos Ribeiro',
            'Helena Gomes Carvalho',
            'Davi Nascimento Araújo',
            'Valentina Barbosa Reis',
            'Rafael Cardoso Fernandes',
            'Laura Dias Rocha',
            'Heitor Monteiro Castro',
            'Manuela Correia Moreira',
            'Bernardo Teixeira Nunes',
            'Isabella Cavalcanti Ramos',
            'Enzo Batista Azevedo',
            'Luiza Melo Freitas',
            'Guilherme Rezende Duarte',
            'Beatriz Campos Mendes',
            'Pedro Henrique Barros',
            'Cecília Macedo Pinto',
            'Lorenzo Moura Vieira',
            'Mariana Gonçalves Castro',
            'Théo Cunha Tavares',
            'Melissa Farias Moura',
            'Nicolas Viana Lopes',
            'Lara Andrade Santana',
        ];

        $escolaridades = [
            '1º Ano - Ensino Fundamental I',
            '2º Ano - Ensino Fundamental I',
            '3º Ano - Ensino Fundamental I',
            '4º Ano - Ensino Fundamental I',
            '5º Ano - Ensino Fundamental I',
            '6º Ano - Ensino Fundamental II',
            '7º Ano - Ensino Fundamental II',
            '8º Ano - Ensino Fundamental II',
            '9º Ano - Ensino Fundamental II',
        ];

        $turnos = ['Matutino', 'Vespertino', 'Integral'];
        $turmasLetras = ['A', 'B', 'C', 'D'];

        // Criar 30 alunos distribuídos entre as 19 escolas (ids 1 a 19)
        foreach ($nomes as $index => $nome) {
            // Distribuir alunos entre as escolas
            $escolaId = ($index % 19) + 1;

            // Idade entre 6 e 15 anos (ensino fundamental)
            $idade = rand(6, 15);

            // Escolaridade baseada na idade (aproximadamente)
            $escolaridadeIndex = min($idade - 6, count($escolaridades) - 1);
            $escolaridade = $escolaridades[$escolaridadeIndex];

            // Turno aleatório
            $turno = $turnos[array_rand($turnos)];

            // Turma (ano + letra)
            $anoEscolaridade = ($escolaridadeIndex + 1);
            $letraTurma = $turmasLetras[array_rand($turmasLetras)];
            $turma = $anoEscolaridade . 'º ' . $letraTurma;

            Aluno::create([
                'nome' => $nome,
                'idade' => $idade,
                'escolaridade' => $escolaridade,
                'turno' => $turno,
                'turma' => $turma,
                'escola_id' => $escolaId,
            ]);
        }
    }
}
