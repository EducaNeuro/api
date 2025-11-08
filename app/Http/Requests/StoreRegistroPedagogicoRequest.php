<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRegistroPedagogicoRequest extends FormRequest
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
            'aluno_id' => ['required', 'integer', 'exists:alunos,id'],
            'anexo_id' => ['nullable', 'integer', 'exists:anexos,id'],
            'registro_desenvolvimento' => ['nullable', 'string'],
            'observacoes_pedagogicas' => ['nullable', 'string'],
            'progresso_observado' => ['nullable', 'string'],
            'dificuldades_encontradas' => ['nullable', 'string'],
            'estrategias_utilizadas' => ['nullable', 'string'],
            'resultados_obtidos' => ['nullable', 'string'],
            'proximos_passos' => ['nullable', 'string'],
            'data_avaliacao' => ['nullable', 'date'],
            'proxima_avaliacao' => ['nullable', 'date'],
            'observacao_avaliacao' => ['nullable', 'string'],
            'participacao_familia' => ['nullable', 'string'],
            'orientacao_familia' => ['nullable', 'string'],
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
