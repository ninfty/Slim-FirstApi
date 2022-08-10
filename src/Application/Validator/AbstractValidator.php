<?php

namespace App\Application\Validator;

use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
use Exception;

abstract class AbstractValidator
{
    public $errors = [];

    public function validate(array $request): bool
    {
        foreach ($this->rules() as $field => $rule) {
            try {
                $rule->assert($request[$field] ?? null);
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }
        }

        return !$this->errors();
    }

    public function errors(): array
    {
        return $this->errors;
    }

    abstract public function rules(): array;
}