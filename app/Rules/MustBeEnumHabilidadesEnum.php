<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Enum\InventarioHabilidadesEnum;

class MustBeEnumHabilidadesEnum implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validValues = array_map(fn($case) => $case->value, InventarioHabilidadesEnum::cases());
        
        if (!in_array($value, $validValues)) {
            $fail('O campo :attribute deve ser um valor válido: ' . implode(', ', $validValues));
        }
    }
}
