<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\CreateBook;
use Fig\Http\Message\StatusCodeInterface;

class CreateBookController
{
    public function __construct(
        private CreateBook $createBook,
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody();
        
        $data = $this->createBook->execute($body['title']);

        return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
