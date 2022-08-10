<?php

namespace App\Application\Validation;

use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
use Exception;

abstract class AbstractValidator
{
    public $errors = [];

    public function validate(array $request)//: bool
    {
        foreach ($this->rules() as $field => $rule) {
            try {
                $rule->assert($request[$field]);
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }
            // return $rule->validate($field, $rule);
        }

        return $this->errors;

        // return $this->validate();
    }

    abstract public function rules(): array;
}