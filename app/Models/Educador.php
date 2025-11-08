<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Educador extends Authenticatable
{
    protected $table = 'educadores';

    protected $fillable = [
        'email',
        'cpf',
        'telefone',
        'password',
        'disciplina',
        'turno',
        'escola_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class);
    }

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }
}
