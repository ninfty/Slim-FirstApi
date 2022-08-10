<?php

namespace App\Application\Validator;

use Respect\Validation\Validator;

class CreateBookValidator extends AbstractValidator
{
    public function rules(): array
    {
        return [
            'title' => Validator::notEmpty(),
        ];
    }
}