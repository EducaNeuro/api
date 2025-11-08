<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    protected $fillable = [
        'nome',
        'ativo',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function escolas()
    {
        return $this->hasMany(Escola::class);
    }
}
