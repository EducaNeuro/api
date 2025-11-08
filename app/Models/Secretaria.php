<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secretaria extends Authenticatable
{
    protected $table = 'secretarias';
    protected $fillable = [
        'nome',
        'ativo',
        'latitude',
        'longitude',
        'email',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function escolas(): HasMany
    {
        return $this->hasMany(Escola::class);
    }
}
