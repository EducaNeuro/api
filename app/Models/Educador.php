<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educador extends Model
{
    protected $fillable = [
        'email',
        'cpf',
        'telefone',
        'senha',
        'disciplina',
        'turno'
    ];
}
