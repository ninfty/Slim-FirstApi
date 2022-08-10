<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\CreateBook;
use Fig\Http\Message\StatusCodeInterface;
use App\Application\Validator\CreateBookValidator;
// use App\Application\Exception\ValidatorException;

class CreateBookController
{
    public function __construct(
        private CreateBook $createBook,
        private CreateBookValidator $validator
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody(); 
        
        if(!$this->validator->validate($body)) {
            return $response->withJson($this->validator->errors(), StatusCodeInterface::STATUS_BAD_REQUEST);
            
            // throw new ValidatorException($request);
        }

        $data = $this->createBook->execute($body['title']);

        return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
