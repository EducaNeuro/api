<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreEscolaRequest extends FormRequest
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
            'id' => ['sometimes', 'integer', 'exists:escolas,id'],
            'nome' => ['required_without:id', 'string', 'max:255'],
            'email' => [
                'required_without:id',
                'email',
                'max:255',
                Rule::unique('escolas', 'email')->ignore($this->input('id')),
            ],
            'password' => ['required_without:id', 'string', 'min:6'],
            'secretaria_id' => ['required_without:id', 'integer', 'exists:secretarias,id'],
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
