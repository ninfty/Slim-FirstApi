<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\UpdateBook;
use Fig\Http\Message\StatusCodeInterface;

class UpdateBookController
{
    public function __construct(
        private UpdateBook $updateBook,
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody();
        
        $data = $this->updateBook->execute($args['id'], $body['title']);

        return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
