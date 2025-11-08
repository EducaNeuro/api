<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'estudante_id',
        'descricao_meta',
        'indicador_sucesso',
        'prazo',
        'observacoes_gerais'
    ];
}
