<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Responsavel extends Model
{
    protected $table = 'responsaveis';

    protected $fillable = [
        'aluno_id',
        'nome',
        'nivel_parental',
        'cpf',
        'telefone',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
