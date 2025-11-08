<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrientacaoPedagogica extends Model
{
    protected $table = 'orientacoes_pedagogicas';

    protected $fillable = [
        'aluno_id',
        'estimulos_recomendados',
        'recursos_recomendados',
        'estrategias_pedagogicas',
        'recursos_didaticos',
        'procedimentos_intervencao',
        'adaptacoes_curriculares',
        'avaliacao_adaptada',
        'tempo_adicional',
        'apoio_tecnologico',
        'outras_orientacoes'
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
