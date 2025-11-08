<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Educador extends Authenticatable
{
    protected $fillable = [
        'email',
        'cpf',
        'telefone',
        'password',
        'disciplina',
        'turno'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class);
    }
}
