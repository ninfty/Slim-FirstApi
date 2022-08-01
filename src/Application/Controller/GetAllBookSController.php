<?php

namespace App\Application\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\GetAllBooks;
use App\Application\Response\JsonResponse;
use Fig\Http\Message\StatusCodeInterface;

class GetAllBooksController
{
    public function __construct(
        private GetAllBooks $getAllBooks,
        private JsonResponse $json
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->getAllBooks->execute();

        return $this->json->response($response, $data, StatusCodeInterface::STATUS_OK);
    }
}
