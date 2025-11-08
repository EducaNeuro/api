<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePlanejamentoRequest extends FormRequest
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
            'adaptacoes_ambientais' => ['sometimes', 'nullable', 'string'],
            'organizacao_rotina' => ['sometimes', 'nullable', 'string'],
            'estrategias_principais' => ['sometimes', 'nullable', 'string'],
            'outros_recursos' => ['sometimes', 'nullable', 'string'],
            'objetivos' => ['sometimes', 'nullable', 'string'],
            'estrategias' => ['sometimes', 'nullable', 'string'],
            'observacoes_gerais' => ['sometimes', 'nullable', 'string'],
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
