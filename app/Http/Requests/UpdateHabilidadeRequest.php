<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateHabilidadeRequest extends FormRequest
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
            'autonomia_pessoal' => ['nullable', 'string'],
            'socializacao' => ['nullable', 'string'],
            'motricidade' => ['nullable', 'string'],
            'comunicacao' => ['nullable', 'string'],
            'desenvolvimento_cognitivo' => ['nullable', 'string'],
            'aspectos_comportamentais' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.string' => 'O campo :attribute deve ser uma string.',
            '*.exists' => 'O campo :attribute deve ser um ID válido.',
            '*.integer' => 'O campo :attribute deve ser um número inteiro.',
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
