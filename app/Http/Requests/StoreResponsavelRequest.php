<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreResponsavelRequest extends FormRequest
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
            'id' => ['sometimes', 'integer', 'exists:responsaveis,id'],
            'nome' => ['required_without:id', 'string', 'max:255'],
            'aluno_id' => ['required_without:id', 'integer', 'exists:alunos,id'],
            'nivel_parental' => ['required_without:id', 'string', 'max:100'],
            'cpf' => [
                'required_without:id',
                'string',
                'max:14',
                Rule::unique('responsaveis', 'cpf')->ignore($this->input('id')),
            ],
            'telefone' => ['nullable', 'string', 'max:15'],
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
