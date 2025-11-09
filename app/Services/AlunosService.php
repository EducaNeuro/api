<?php

namespace App\Services;

use App\Models\Aluno;
use App\Repositories\AlunosRepository;
use App\Support\AuthContext;

class AlunosService
{
    public function __construct(private readonly AlunosRepository $alunosRepository) {}

    public function all()
    {
        $escolaId = AuthContext::escolaId();
        return $this->alunosRepository->all($escolaId);
    }

    public function create(array $data): Aluno
    {
        return $this->alunosRepository->create($data);
    }

    public function find(int $id): Aluno
    {
        return $this->alunosRepository->findOrFail($id);
    }

    public function fullDetails(int $id): array
    {
        $relations = [
            'escola',
            'responsaveis',
            'diagnosticos',
            'registrosPedagogicos.anexo',
            'inventariosHabilidades',
            'orientacoesPedagogicas',
            'metas',
            'habilidades',
            'entrevistasFamiliares',
            'planejamentos.planosTrimestral',
            'anexos',
        ];

        $escolaId = AuthContext::escolaId();

        $aluno = $this->alunosRepository->findWithRelations($id, $relations, $escolaId);

        return $this->formatAlunoDetails($aluno);
    }

    public function update(int $id, array $data): Aluno
    {
        $aluno = $this->alunosRepository->findOrFail($id);

        return $this->alunosRepository->update($aluno, $data);
    }

    public function delete(int $id): void
    {
        $aluno = $this->alunosRepository->findOrFail($id);
        $this->alunosRepository->delete($aluno);
    }

    private function formatAlunoDetails(Aluno $aluno): array
    {
        return [
            'aluno' => $this->filterAluno($aluno),
            'escola' => $aluno->escola ? $aluno->escola->only(['nome', 'email']) : null,
            'responsaveis' => $aluno->responsaveis->map(
                fn ($responsavel) => $responsavel->only(['nome', 'nivel_parental', 'cpf', 'telefone'])
            )->values(),
            'diagnosticos' => $aluno->diagnosticos->map(
                fn ($diagnostico) => $diagnostico->only(['nome', 'observacoes'])
            )->values(),
            'registros_pedagogicos' => $aluno->registrosPedagogicos->map(
                function ($registro) {
                    return [
                        'registro_desenvolvimento' => $registro->registro_desenvolvimento,
                        'observacoes_pedagogicas' => $registro->observacoes_pedagogicas,
                        'progresso_observado' => $registro->progresso_observado,
                        'dificuldades_encontradas' => $registro->dificuldades_encontradas,
                        'estrategias_utilizadas' => $registro->estrategias_utilizadas,
                        'resultados_obtidos' => $registro->resultados_obtidos,
                        'proximos_passos' => $registro->proximos_passos,
                        'data_avaliacao' => optional($registro->data_avaliacao)->toDateString(),
                        'proxima_avaliacao' => optional($registro->proxima_avaliacao)->toDateString(),
                        'observacao_avaliacao' => $registro->observacao_avaliacao,
                        'participacao_familia' => $registro->participacao_familia,
                        'orientacao_familia' => $registro->orientacao_familia,
                        'anexo_url' => $registro->anexo?->url,
                        'anexo_observacao' => $registro->anexo?->observacao,
                    ];
                }
            )->values(),
            'inventario_habilidades' => $aluno->inventariosHabilidades->map(
                fn ($inventario) => collect($inventario)
                    ->except(['id', 'aluno_id', 'created_at', 'updated_at'])
                    ->toArray()
            )->values(),
            'orientacoes_pedagogicas' => $aluno->orientacoesPedagogicas->map(
                fn ($orientacao) => collect($orientacao)
                    ->except(['id', 'aluno_id', 'created_at', 'updated_at'])
                    ->toArray()
            )->values(),
            'metas' => $aluno->metas->map(
                fn ($meta) => [
                    'descricao_meta' => $meta->descricao_meta,
                    'indicador_sucesso' => $meta->indicador_sucesso,
                    'prazo' => optional($meta->prazo)->toDateString(),
                    'observacoes_gerais' => $meta->observacoes_gerais,
                ]
            )->values(),
            'habilidades' => $aluno->habilidades->map(
                fn ($habilidade) => collect($habilidade)
                    ->except(['id', 'aluno_id', 'created_at', 'updated_at'])
                    ->toArray()
            )->values(),
            'entrevistas_familiares' => $aluno->entrevistasFamiliares->map(
                fn ($entrevista) => collect($entrevista)
                    ->except(['id', 'aluno_id', 'created_at', 'updated_at'])
                    ->toArray()
            )->values(),
            'planejamentos' => $aluno->planejamentos->map(
                function ($planejamento) {
                    return [
                        'adaptacoes_ambientais' => $planejamento->adaptacoes_ambientais,
                        'organizacao_rotina' => $planejamento->organizacao_rotina,
                        'estrategias_principais' => $planejamento->estrategias_principais,
                        'outros_recursos' => $planejamento->outros_recursos,
                        'objetivos' => $planejamento->objetivos,
                        'estrategias' => $planejamento->estrategias,
                        'observacoes_gerais' => $planejamento->observacoes_gerais,
                        'planos_trimestrais' => $planejamento->planosTrimestral->map(
                            fn ($plano) => [
                                'objetivo' => $plano->objetivo,
                                'estrategias' => $plano->estrategias,
                            ]
                        )->values(),
                    ];
                }
            )->values(),
        ];
    }

    private function filterAluno(Aluno $aluno): array
    {
        return [
            'nome' => $aluno->nome,
            'idade' => $aluno->idade,
            'escolaridade' => $aluno->escolaridade,
            'turno' => $aluno->turno,
            'turma' => $aluno->turma,
            'data_nascimento' => $aluno->data_nascimento,
            'anexos' => $this->formatAnexos($aluno),
        ];
    }

    private function formatAnexos(Aluno $aluno): array
    {
        return $aluno->anexos
            ->map(
                fn ($anexo) => $anexo->only(['id', 'url', 'observacao'])
            )
            ->values()
            ->toArray();
    }
}
