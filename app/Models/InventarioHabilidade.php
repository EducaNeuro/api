<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventarioHabilidade extends Model
{
    protected $table = "inventario_habilidades";

    protected $fillable = [
        'aluno_id',
        'coordenacao_motora_grossa',
        'coordenacao_motora_fina',
        'equilibrio',
        'lateralidade',
        'orientacao_espacial',
        'esquema_corporal',
        'percepcao_visual',
        'percepcao_auditiva',
        'percepcao_tatil',
        'integracao_sensorial',
        'processamento_sensorial',
        'discriminacao_sensorial',
        'interacao_pares',
        'interacao_adultos',
        'participacao_grupos',
        'cooperacao',
        'empatia',
        'resolucao_conflitos',
        'autoregulacao',
        'atencao_concentracao',
        'segmento_regras',
        'flexibilidade',
        'controle_impulsos',
        'tolerancia_frustacao',
        'compreensao_verbal',
        'expressao_verbal',
        'comunicacao_nao_verbal',
        'vocabulario',
        'estrutura_linguagem',
        'comunicacao_funcional',
        'resolucao_problemas',
        'pensamento_abstrato',
        'sequenciacao',
        'classificacao',
        'comparacao',
        'causa_efeito',
        'observacoes_gerais'
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
