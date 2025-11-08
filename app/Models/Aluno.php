<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'idade',
        'escolaridade',
        'turno',
        'turma',
        'educador_id',
        'escola_id'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }
}
