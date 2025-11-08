<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistroPedagogico extends Model
{
    protected $table = 'registro_pedagogico';

    protected $fillable = [
        'aluno_id',
        'anexo_id',
        'registro_desenvolvimento',
        'observacoes_pedagogicas',
        'progresso_observado',
        'dificuldades_encontradas',
        'estrategias_utilizadas',
        'resultados_obtidos',
        'proximos_passos',
        'data_avaliacao',
        'proxima_avaliacao',
        'observacao_avaliacao',
        'participacao_familia',
        'orientacao_familia'
    ];

    protected $casts = [
        'data_avaliacao' => 'date',
        'proxima_avaliacao' => 'date',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    public function anexo(): BelongsTo
    {
        return $this->belongsTo(Anexo::class);
    }
}
