<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateEducadorRequest extends FormRequest
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
        $educadorId = (int) $this->route('id');

        return [
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('educadores', 'email')->ignore($educadorId),
            ],
            'cpf' => [
                'sometimes',
                'string',
                'max:14',
                Rule::unique('educadores', 'cpf')->ignore($educadorId),
            ],
            'telefone' => ['sometimes', 'string', 'max:15'],
            'password' => ['sometimes', 'string', 'min:6'],
            'disciplina' => ['sometimes', 'string', 'max:50'],
            'turno' => ['sometimes', 'string', 'max:50'],
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
