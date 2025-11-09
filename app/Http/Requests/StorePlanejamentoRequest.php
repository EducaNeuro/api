<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePlanejamentoRequest extends FormRequest
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
            'id' => ['sometimes', 'integer', 'exists:planejamento,id'],
            'aluno_id' => ['required_without:id', 'integer', 'exists:alunos,id'],
            'adaptacoes_ambientais' => ['nullable', 'string'],
            'organizacao_rotina' => ['nullable', 'string'],
            'estrategias_principais' => ['nullable', 'string'],
            'outros_recursos' => ['nullable', 'string'],
            'objetivos' => ['nullable', 'string'],
            'estrategias' => ['nullable', 'string'],
            'observacoes_gerais' => ['nullable', 'string'],
            'prazo' => ['nullable', 'date'],
            'indicador_sucesso' => ['nullable', 'string'],
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
