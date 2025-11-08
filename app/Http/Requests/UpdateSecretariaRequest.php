<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateSecretariaRequest extends FormRequest
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
        $secretariaId = (int) $this->route('id');

        return [
            'nome' => ['sometimes', 'string', 'max:255'],
            'ativo' => ['sometimes', 'boolean'],
            'latitude' => ['sometimes', 'numeric', 'between:-90,90'],
            'longitude' => ['sometimes', 'numeric', 'between:-180,180'],
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('secretarias', 'email')->ignore($secretariaId),
            ],
            'password' => ['sometimes', 'string', 'min:6'],
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
