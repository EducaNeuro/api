<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrevistaFamiliar extends Model
{
    protected $fillable = [
        'estudante_id',
        'gestacao_e_primeiros_meses',
        'sociabilidade',
        'comportamento',
        'sensibilidade_sensorial',
        'quadro_convulsivo',
        'uso_medicamento',
        'composicao_familiar',
        'interesses_pessoais',
        'servicos_apoio'
    ];
}
