<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanoTrimestral extends Model
{
    protected $table = 'plano_trimestral';

    protected $fillable = [
        'planejamento_id',
        'objetivo',
        'estrategias'
    ];

    public function planejamento(): BelongsTo
    {
        return $this->belongsTo(Planejamento::class);
    }
}
