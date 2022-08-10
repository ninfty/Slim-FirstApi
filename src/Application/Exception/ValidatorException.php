<?php

namespace App\Application\Exception;

use Slim\Exception\HttpSpecializedException;

class ValidatorException extends HttpSpecializedException
{
    protected $code = 422;
    protected $message = 'my message';
    protected $title = 'Validation exception';
    protected $description = 'Custom exception';
}