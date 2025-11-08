<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habilidade extends Model
{
    protected $fillable = [
        'aluno_id',
        'autonomia_pessoal',
        'socializacao',
        'motricidade',
        'comunicacao',
        'desenvolvimento_cognitivo',
        'aspectos_comportamentais'
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
