<?php

namespace App\Enum;

enum InventarioHabilidadesEnum: string
{
    case REALIZA = 'realiza';
    case NAO_AVALIADO = 'nao_avaliado';
    case NAO_OBSERVADO = 'nao_observado';
    case EM_DESENVOLVIMENTO = 'em_desenvolvimento';
    case NAO_REALIZA = 'nao_realiza';
}
