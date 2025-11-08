<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Planejamento extends Model
{
    protected $table = 'planejamento';

    protected $fillable = [
        'aluno_id',
        'adaptacoes_ambientais',
        'organizacao_rotina',
        'estrategias_principais',
        'outros_recursos',
        'objetivos',
        'estrategias',
        'observacoes_gerais'
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    public function planosTrimestral(): HasMany
    {
        return $this->hasMany(PlanoTrimestral::class);
    }
}
