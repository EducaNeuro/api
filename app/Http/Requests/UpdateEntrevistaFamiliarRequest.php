<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEntrevistaFamiliarRequest extends FormRequest
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
            'gestacao_e_primeiros_meses' => ['nullable', 'string'],
            'sociabilidade' => ['nullable', 'string'],
            'comportamento' => ['nullable', 'string'],
            'sensibilidade_sensorial' => ['nullable', 'boolean'],
            'quadro_convulsivo' => ['nullable', 'boolean'],
            'uso_medicamento' => ['nullable', 'boolean'],
            'composicao_familiar' => ['nullable', 'string'],
            'interesses_pessoais' => ['nullable', 'string'],
            'esteriotipia' => ['nullable', 'string'],
            'servicos_apoio' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.string' => 'O campo :attribute deve ser uma string.',
            '*.boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
            '*.exists' => 'O campo :attribute deve ser um ID válido.',
            '*.integer' => 'O campo :attribute deve ser um número inteiro.',
            '*.max' => 'O campo :attribute não pode ter mais de :max caracteres.',
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
