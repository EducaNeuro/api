<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anexo extends Model
{
    protected $table = 'anexos';

    protected $fillable = [
        'url',
        'observacao',
    ];

    public function registrosPedagogicos(): HasMany
    {
        return $this->hasMany(RegistroPedagogico::class);
    }

    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class, 'aluno_anexo');
    }
}
