<?php

namespace App\Application\Validation;

use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;

abstract class AbstractValidator
{
    public $errors = [];

    public function validate(array $request): bool
    {
        foreach ($this->rules() as $field => $rule) {
            try {
                $rule->assert($request[$field] ?? null);

                return true;
                
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();

                return false;
            }
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }

    abstract public function rules(): array;
}