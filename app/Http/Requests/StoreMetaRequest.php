<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMetaRequest extends FormRequest
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
            'descricao_meta' => ['nullable', 'string'],
            'indicador_sucesso' => ['nullable', 'string'],
            'prazo' => ['nullable', 'date'],
            'observacoes_gerais' => ['nullable', 'string'],
        ];
    }


    public function messages(): array
    {
        return [
            '*.string' => 'O campo :attribute deve ser uma string.',
            '*.date' => 'O campo :attribute deve ser uma data válida.',
            '*.exists' => 'O campo :attribute deve ser um ID válido.',
            '*.integer' => 'O campo :attribute deve ser um número inteiro.',
        ];
    }
}
