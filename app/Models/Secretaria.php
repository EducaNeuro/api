<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secretaria extends Model
{
    protected $table = "secretaria";
    protected $fillable = [
        'nome',
        'ativo',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function escolas(): HasMany
    {
        return $this->hasMany(Escola::class);
    }
}
