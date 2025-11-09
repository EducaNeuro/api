<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreEducadorRequest extends FormRequest
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
            'id' => ['sometimes', 'integer', 'exists:educadores,id'],
            'email' => [
                'required_without:id',
                'email',
                'max:255',
                Rule::unique('educadores', 'email')->ignore($this->input('id')),
            ],
            'cpf' => [
                'required_without:id',
                'string',
                'max:14',
                Rule::unique('educadores', 'cpf')->ignore($this->input('id')),
            ],
            'telefone' => ['required_without:id', 'string', 'max:15'],
            'disciplina' => ['required_without:id', 'string', 'max:50'],
            'turno' => ['required_without:id', 'string', 'max:50', 'in:manha,tarde,noite'],
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
