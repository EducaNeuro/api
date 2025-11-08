<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAlunoRequest extends FormRequest
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
            'nome' => ['sometimes', 'string', 'max:255'],
            'idade' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'escolaridade' => ['sometimes', 'string', 'max:255'],
            'turno' => ['sometimes', 'string', 'max:50'],
            'turma' => ['sometimes', 'string', 'max:50'],
            'escola_id' => ['sometimes', 'integer', 'exists:escolas,id'],
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
