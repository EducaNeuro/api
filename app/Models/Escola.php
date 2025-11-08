<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escola extends Model
{
    protected $table = "escola";
    protected $fillable = [
        'nome',
        'secretaria_id'
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
