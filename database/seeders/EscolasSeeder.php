<?php

namespace Database\Seeders;

use App\Models\Escola;
use App\Models\Secretaria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EscolasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Escolas para São Paulo (secretaria_id: 1)
        $escolasSP = [
            ['nome' => 'EMEF Prof. Paulo Freire', 'slug' => 'paulo-freire'],
            ['nome' => 'EMEF Cecília Meireles', 'slug' => 'cecilia-meireles'],
            ['nome' => 'EMEF Carlos Drummond de Andrade', 'slug' => 'carlos-drummond'],
            ['nome' => 'EMEF Monteiro Lobato', 'slug' => 'monteiro-lobato'],
            ['nome' => 'EMEF Anísio Teixeira', 'slug' => 'anisio-teixeira'],
        ];

        // Escolas para Rio de Janeiro (secretaria_id: 2)
        $escolasRJ = [
            ['nome' => 'EM Tarsila do Amaral', 'slug' => 'tarsila-amaral'],
            ['nome' => 'EM Vinícius de Moraes', 'slug' => 'vinicius-moraes'],
            ['nome' => 'EM Machado de Assis', 'slug' => 'machado-assis'],
            ['nome' => 'EM Clarice Lispector', 'slug' => 'clarice-lispector'],
        ];

        // Escolas para Belo Horizonte (secretaria_id: 3)
        $escolasBH = [
            ['nome' => 'EM Professor Hilton Rocha', 'slug' => 'hilton-rocha'],
            ['nome' => 'EM Maria Montessori', 'slug' => 'maria-montessori'],
            ['nome' => 'EM Dom Silvério', 'slug' => 'dom-silverio'],
            ['nome' => 'EM Anne Sullivan', 'slug' => 'anne-sullivan'],
        ];

        // Escolas para Brasília (secretaria_id: 4)
        $escolasBSB = [
            ['nome' => 'CEF 01 do Plano Piloto', 'slug' => 'cef01-pp'],
            ['nome' => 'EC 308 Sul', 'slug' => 'ec308sul'],
            ['nome' => 'CEI 01 de Brasília', 'slug' => 'cei01-bsb'],
        ];

        // Escolas para Curitiba (secretaria_id: 5)
        $escolasCWB = [
            ['nome' => 'EM Prof. Erasmo Pilotto', 'slug' => 'erasmo-pilotto'],
            ['nome' => 'EM Vila Sandra', 'slug' => 'vila-sandra'],
            ['nome' => 'EM Santa Cândida', 'slug' => 'santa-candida'],
        ];

        // Criar escolas de São Paulo
        foreach ($escolasSP as $escola) {
            Escola::create([
                'nome' => $escola['nome'],
                'email' => $escola['slug'] . '@sp.edu.br',
                'password' => Hash::make('12345'),
                'secretaria_id' => 1,
            ]);
        }

        // Criar escolas do Rio de Janeiro
        foreach ($escolasRJ as $escola) {
            Escola::create([
                'nome' => $escola['nome'],
                'email' => $escola['slug'] . '@rj.edu.br',
                'password' => Hash::make('12345'),
                'secretaria_id' => 2,
            ]);
        }

        // Criar escolas de Belo Horizonte
        foreach ($escolasBH as $escola) {
            Escola::create([
                'nome' => $escola['nome'],
                'email' => $escola['slug'] . '@bh.edu.br',
                'password' => Hash::make('12345'),
                'secretaria_id' => 3,
            ]);
        }

        // Criar escolas de Brasília
        foreach ($escolasBSB as $escola) {
            Escola::create([
                'nome' => $escola['nome'],
                'email' => $escola['slug'] . '@df.edu.br',
                'password' => Hash::make('12345'),
                'secretaria_id' => 4,
            ]);
        }

        // Criar escolas de Curitiba
        foreach ($escolasCWB as $escola) {
            Escola::create([
                'nome' => $escola['nome'],
                'email' => $escola['slug'] . '@cwb.edu.br',
                'password' => Hash::make('12345'),
                'secretaria_id' => 5,
            ]);
        }
    }
}
