<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsaveis extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
        'senha',
        'aluno_id'
    ];
}
