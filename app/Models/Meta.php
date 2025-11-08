<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meta extends Model
{
    protected $table = "metas";

    protected $fillable = [
        'aluno_id',
        'descricao_meta',
        'indicador_sucesso',
        'prazo',
        'observacoes_gerais'
    ];

    protected $casts = [
        'prazo' => 'date',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
