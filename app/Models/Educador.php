<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Educador extends Authenticatable
{
    protected $table = 'educadores';

    protected $fillable = [
        'email',
        'cpf',
        'telefone',
        'senha',
        'disciplina',
        'turno'
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class);
    }
}
