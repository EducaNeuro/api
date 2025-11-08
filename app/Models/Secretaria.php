<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    protected $fillable = [
        'nome',
        'ativo'
    ];

    public function escolas()
    {
        return $this->hasMany(Escola::class);
    }
}
