<?php

namespace Database\Seeders;

use App\Models\Educador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EducadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educadores = [
            // Professores de Língua Portuguesa
            [
                'email' => 'maria.silva@educacao.gov.br',
                'cpf' => '12345678901',
                'telefone' => '11987654321',
                'password' => Hash::make('12345'),
                'disciplina' => 'Língua Portuguesa',
                'turno' => 'Matutino',
            ],
            [
                'email' => 'joao.santos@educacao.gov.br',
                'cpf' => '23456789012',
                'telefone' => '11987654322',
                'password' => Hash::make('12345'),
                'disciplina' => 'Língua Portuguesa',
                'turno' => 'Vespertino',
            ],

            // Professores de Matemática
            [
                'email' => 'ana.oliveira@educacao.gov.br',
                'cpf' => '34567890123',
                'telefone' => '11987654323',
                'password' => Hash::make('12345'),
                'disciplina' => 'Matemática',
                'turno' => 'Matutino',
            ],
            [
                'email' => 'pedro.costa@educacao.gov.br',
                'cpf' => '45678901234',
                'telefone' => '11987654324',
                'password' => Hash::make('12345'),
                'disciplina' => 'Matemática',
                'turno' => 'Vespertino',
            ],

            // Professores de Ciências
            [
                'email' => 'carla.ferreira@educacao.gov.br',
                'cpf' => '56789012345',
                'telefone' => '11987654325',
                'password' => Hash::make('12345'),
                'disciplina' => 'Ciências',
                'turno' => 'Matutino',
            ],
            [
                'email' => 'roberto.almeida@educacao.gov.br',
                'cpf' => '67890123456',
                'telefone' => '11987654326',
                'password' => Hash::make('12345'),
                'disciplina' => 'Ciências',
                'turno' => 'Integral',
            ],

            // Professores de História
            [
                'email' => 'lucia.martins@educacao.gov.br',
                'cpf' => '78901234567',
                'telefone' => '11987654327',
                'password' => Hash::make('12345'),
                'disciplina' => 'História',
                'turno' => 'Vespertino',
            ],

            // Professores de Geografia
            [
                'email' => 'ricardo.lima@educacao.gov.br',
                'cpf' => '89012345678',
                'telefone' => '11987654328',
                'password' => Hash::make('12345'),
                'disciplina' => 'Geografia',
                'turno' => 'Matutino',
            ],

            // Professores de Educação Física
            [
                'email' => 'juliana.souza@educacao.gov.br',
                'cpf' => '90123456789',
                'telefone' => '11987654329',
                'password' => Hash::make('12345'),
                'disciplina' => 'Educação Física',
                'turno' => 'Integral',
            ],
            [
                'email' => 'marcos.pereira@educacao.gov.br',
                'cpf' => '01234567890',
                'telefone' => '11987654330',
                'password' => Hash::make('12345'),
                'disciplina' => 'Educação Física',
                'turno' => 'Vespertino',
            ],

            // Professores de Artes
            [
                'email' => 'fernanda.gomes@educacao.gov.br',
                'cpf' => '11234567890',
                'telefone' => '11987654331',
                'password' => Hash::make('12345'),
                'disciplina' => 'Artes',
                'turno' => 'Matutino',
            ],

            // Professores de Inglês
            [
                'email' => 'patricia.cardoso@educacao.gov.br',
                'cpf' => '22234567890',
                'telefone' => '11987654332',
                'password' => Hash::make('12345'),
                'disciplina' => 'Inglês',
                'turno' => 'Vespertino',
            ],

            // Professor Polivalente (Ensino Fundamental I)
            [
                'email' => 'claudia.ribeiro@educacao.gov.br',
                'cpf' => '33234567890',
                'telefone' => '11987654333',
                'password' => Hash::make('12345'),
                'disciplina' => 'Polivalente',
                'turno' => 'Matutino',
            ],
            [
                'email' => 'andrea.araujo@educacao.gov.br',
                'cpf' => '44234567890',
                'telefone' => '11987654334',
                'password' => Hash::make('12345'),
                'disciplina' => 'Polivalente',
                'turno' => 'Vespertino',
            ],
            [
                'email' => 'renata.barbosa@educacao.gov.br',
                'cpf' => '55234567890',
                'telefone' => '11987654335',
                'password' => Hash::make('12345'),
                'disciplina' => 'Polivalente',
                'turno' => 'Integral',
            ],

            // Educação Especial / AEE (Atendimento Educacional Especializado)
            [
                'email' => 'beatriz.moreira@educacao.gov.br',
                'cpf' => '66234567890',
                'telefone' => '11987654336',
                'password' => Hash::make('12345'),
                'disciplina' => 'Educação Especial',
                'turno' => 'Matutino',
            ],
            [
                'email' => 'daniela.reis@educacao.gov.br',
                'cpf' => '77234567890',
                'telefone' => '11987654337',
                'password' => Hash::make('12345'),
                'disciplina' => 'Educação Especial',
                'turno' => 'Vespertino',
            ],
            [
                'email' => 'cristina.nunes@educacao.gov.br',
                'cpf' => '88234567890',
                'telefone' => '11987654338',
                'password' => Hash::make('12345'),
                'disciplina' => 'Educação Especial',
                'turno' => 'Integral',
            ],

            // Psicopedagogo
            [
                'email' => 'sandra.castro@educacao.gov.br',
                'cpf' => '99234567890',
                'telefone' => '11987654339',
                'password' => Hash::make('12345'),
                'disciplina' => 'Psicopedagogia',
                'turno' => 'Integral',
            ],

            // Coordenador Pedagógico
            [
                'email' => 'paulo.mendes@educacao.gov.br',
                'cpf' => '10234567891',
                'telefone' => '11987654340',
                'password' => Hash::make('12345'),
                'disciplina' => 'Coordenação Pedagógica',
                'turno' => 'Integral',
            ],
        ];

        foreach ($educadores as $educador) {
            Educador::create($educador);
        }
    }
}
