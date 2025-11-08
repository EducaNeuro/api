<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntrevistaFamiliar extends Model
{
    protected $table = 'entrevista_familiar';

    protected $fillable = [
        'aluno_id',
        'gestacao_e_primeiros_meses',
        'sociabilidade',
        'comportamento',
        'sensibilidade_sensorial',
        'quadro_convulsivo',
        'uso_medicamento',
        'composicao_familiar',
        'interesses_pessoais',
        'esteriotipia',
        'servicos_apoio'
    ];

    protected $casts = [
        'sensibilidade_sensorial' => 'boolean',
        'quadro_convulsivo' => 'boolean',
        'uso_medicamento' => 'boolean',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
