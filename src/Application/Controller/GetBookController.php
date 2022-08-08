<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\GetBook;
use Fig\Http\Message\StatusCodeInterface;

class GetBookController
{
    public function __construct(
        private GetBook $getBook,
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->getBook->execute($args['id']);

        return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
