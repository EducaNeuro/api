<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class IndexInventarioHabilidadesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'aluno_id' => ['required', 'integer', 'exists:alunos,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => $validator->errors()->first(),
        ], 422));
    }

    public function messages(): array
    {
        return [
            'aluno_id.required' => 'O parâmetro aluno_id é obrigatório.',
            'aluno_id.integer' => 'O parâmetro aluno_id deve ser um número inteiro.',
            'aluno_id.exists' => 'O aluno informado não existe.',
        ];
    }
}

