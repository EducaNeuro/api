<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escola extends Model
{
    protected $fillable = [
        'nome',
        'secretaria_id'
    ];

    public function secretaria(): BelongsTo
    {
        return $this->belongsTo(Secretaria::class);
    }

    public function estudantes(): HasMany
    {
        return $this->hasMany(Estudante::class);
    }
}
