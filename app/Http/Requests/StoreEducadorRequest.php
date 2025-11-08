<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'email' => ['required', 'email', 'max:255', 'unique:educadores,email'],
            'cpf' => ['required', 'string', 'max:14', 'unique:educadores,cpf'],
            'telefone' => ['required', 'string', 'max:15'],
            'senha' => ['required', 'string', 'min:6'],
            'disciplina' => ['required', 'string', 'max:50'],
            'turno' => ['required', 'string', 'max:50', 'in:manha,tarde,noite'],
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
