<?php

namespace App\Application\Validation;

use Respect\Validation\Validator;

class CreateBookValidation extends AbstractValidator
{
    public function rules(): array
    {
        return [
            'title' => Validator::notEmpty(),
        ];
    }
}