<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $fillable = [
        'estudante_id',
        'autonomia_pessoal',
        'socializacao',
        'motricidade',
        'comunicacao',
        'aspectos_comportamentais'
    ];
}
