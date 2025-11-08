<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRegistroPedagogicoRequest extends FormRequest
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
            'anexo_id' => ['sometimes', 'nullable', 'integer', 'exists:anexos,id'],
            'registro_desenvolvimento' => ['sometimes', 'nullable', 'string'],
            'observacoes_pedagogicas' => ['sometimes', 'nullable', 'string'],
            'progresso_observado' => ['sometimes', 'nullable', 'string'],
            'dificuldades_encontradas' => ['sometimes', 'nullable', 'string'],
            'estrategias_utilizadas' => ['sometimes', 'nullable', 'string'],
            'resultados_obtidos' => ['sometimes', 'nullable', 'string'],
            'proximos_passos' => ['sometimes', 'nullable', 'string'],
            'data_avaliacao' => ['sometimes', 'nullable', 'date'],
            'proxima_avaliacao' => ['sometimes', 'nullable', 'date'],
            'observacao_avaliacao' => ['sometimes', 'nullable', 'string'],
            'participacao_familia' => ['sometimes', 'nullable', 'string'],
            'orientacao_familia' => ['sometimes', 'nullable', 'string'],
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
