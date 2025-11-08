<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Educador extends Model
{
    protected $fillable = [
        'email',
        'cpf',
        'telefone',
        'senha',
        'disciplina',
        'turno'
    ];

    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class);
    }
}
