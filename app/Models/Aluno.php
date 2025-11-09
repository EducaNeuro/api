<?php

namespace App\Models;

use App\Casts\Encrypted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    protected $table = "alunos";
    protected $fillable = [
        'nome',
        'idade',
        'escolaridade',
        'turno',
        'turma',
        'data_nascimento',
        'escola_id',
    ];

    protected function casts(): array
    {
        return [
            'nome' => Encrypted::class,
        ];
    }

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }

    public function educadores(): BelongsToMany
    {
        return $this->belongsToMany(Educador::class);
    }

    public function responsaveis(): HasMany
    {
        return $this->hasMany(Responsavel::class);
    }

    public function diagnosticos(): HasMany
    {
        return $this->hasMany(Diagnostico::class);
    }

    public function registrosPedagogicos(): HasMany
    {
        return $this->hasMany(RegistroPedagogico::class);
    }

    public function inventariosHabilidades(): HasMany
    {
        return $this->hasMany(InventarioHabilidade::class);
    }

    public function orientacoesPedagogicas(): HasMany
    {
        return $this->hasMany(OrientacaoPedagogica::class);
    }

    public function metas(): HasMany
    {
        return $this->hasMany(Meta::class);
    }

    public function habilidades(): HasMany
    {
        return $this->hasMany(Habilidade::class);
    }

    public function entrevistasFamiliares(): HasMany
    {
        return $this->hasMany(EntrevistaFamiliar::class);
    }

    public function planejamentos(): HasMany
    {
        return $this->hasMany(Planejamento::class);
    }

    public function anexos(): BelongsToMany
    {
        return $this->belongsToMany(Anexo::class, 'aluno_anexo');
    }
}
