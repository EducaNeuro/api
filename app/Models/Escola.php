<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escola extends Authenticatable
{
    protected $table = 'escolas';

    protected $fillable = [
        'nome',
        'email',
        'password',
        'remember_token',
        'secretaria_id',
        'endereco',
        'telefone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function secretaria(): BelongsTo
    {
        return $this->belongsTo(Secretaria::class);
    }

    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }
}
