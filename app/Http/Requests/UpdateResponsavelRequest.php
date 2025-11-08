<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateResponsavelRequest extends FormRequest
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
        $responsavelId = (int) $this->route('id');

        return [
            'nome' => ['sometimes', 'string', 'max:255'],
            'aluno_id' => ['sometimes', 'integer', 'exists:alunos,id'],
            'nivel_parental' => ['sometimes', 'string', 'max:100'],
            'cpf' => [
                'sometimes',
                'string',
                'max:14',
                Rule::unique('responsaveis', 'cpf')->ignore($responsavelId),
            ],
            'telefone' => ['sometimes', 'nullable', 'string', 'max:15'],
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
