<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Criptografa os dados sensíveis dos alunos existentes
     */
    public function up(): void
    {
        $alunos = DB::table('alunos')->get();

        foreach ($alunos as $aluno) {
            $updateData = [];

            if (property_exists($aluno, 'nome') && !is_null($aluno->nome)) {
                try {
                    // Verifica se já está criptografado tentando descriptografar
                    Crypt::decryptString($aluno->nome);
                } catch (\Exception $e) {
                    // Não está criptografado, então criptografa
                    $updateData['nome'] = Crypt::encryptString($aluno->nome);
                }
            }

            if (!empty($updateData)) {
                DB::table('alunos')
                    ->where('id', $aluno->id)
                    ->update($updateData);
            }
        }
    }

    /**
     * Reverse the migrations.
     * Descriptografa os dados (para rollback)
     */
    public function down(): void
    {
        $alunos = DB::table('alunos')->get();

        foreach ($alunos as $aluno) {
            $updateData = [];

            if (property_exists($aluno, 'nome') && !is_null($aluno->nome)) {
                try {
                    $updateData['nome'] = Crypt::decryptString($aluno->nome);
                } catch (\Exception $e) {
                    // Se falhar, mantém o valor original
                }
            }

            if (!empty($updateData)) {
                DB::table('alunos')
                    ->where('id', $aluno->id)
                    ->update($updateData);
            }
        }
    }
};
