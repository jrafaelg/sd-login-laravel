<?php

namespace App\Rules;

use App\Library\PasswordStrengthValidator;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordStrength implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validator = new PasswordStrengthValidator(
            $value,
            8,
            true,
            true,
            true,
            true
        );

        if (!$validator->PasswordIsValid($value)) {
            //$fail('The :attribute must be uppercase.');
            $fail($validator->getErrorMessage());
        }
    }
}
