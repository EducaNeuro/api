<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateOrientacaoPedagogicaRequest extends FormRequest
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
            'aluno_id' => ['sometimes', 'integer', 'exists:alunos,id'],
            'estimulos_recomendados' => ['sometimes', 'nullable', 'string'],
            'recursos_recomendados' => ['sometimes', 'nullable', 'string'],
            'estrategias_pedagogicas' => ['sometimes', 'nullable', 'string'],
            'recursos_didaticos' => ['sometimes', 'nullable', 'string'],
            'procedimentos_intervencao' => ['sometimes', 'nullable', 'string'],
            'adaptacoes_curriculares' => ['sometimes', 'nullable', 'string'],
            'avaliacao_adaptada' => ['sometimes', 'nullable', 'string'],
            'tempo_adicional' => ['sometimes', 'nullable', 'string', 'max:255'],
            'apoio_tecnologico' => ['sometimes', 'nullable', 'string', 'max:255'],
            'outras_orientacoes' => ['sometimes', 'nullable', 'string'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
