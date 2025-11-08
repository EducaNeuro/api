<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrientacaoPedagogicaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'aluno_id' => ['nullable', 'integer', 'exists:alunos,id'],
            'estimulos_recomendados' => ['nullable', 'string'],
            'recursos_recomendados' => ['nullable', 'string'],
            'estrategias_pedagogicas' => ['nullable', 'string'],
            'recursos_didaticos' => ['nullable', 'string'],
            'procedimentos_intervencao' => ['nullable', 'string'],
            'adaptacoes_curriculares' => ['nullable', 'string'],
            'avaliacao_adaptada' => ['nullable', 'string'],
            'tempo_adicional' => ['nullable', 'string', 'max:255'],
            'apoio_tecnologico' => ['nullable', 'string', 'max:255'],
            'outras_orientacoes' => ['nullable', 'string'],
        ];
    }
}
