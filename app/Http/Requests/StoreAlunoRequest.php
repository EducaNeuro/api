<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAlunoRequest extends FormRequest
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
            'id' => ['sometimes', 'integer', 'exists:alunos,id'],
            'nome' => ['nullable', 'string', 'max:255'],
            'idade' => ['nullable', 'integer', 'min:0'],
            'escolaridade' => ['nullable', 'string', 'max:255'],
            'turno' => ['nullable', 'string', 'max:50'],
            'turma' => ['nullable', 'string', 'max:50'],
            'data_nascimento' => ['nullable', 'date'],
            'escola_id' => ['nullable', 'integer', 'exists:escolas,id'],
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
