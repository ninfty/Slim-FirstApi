<?php

namespace App\Application\Controller;

// use Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\GetAllBooks;
// use App\Application\Renderer\JsonRenderer;
use Fig\Http\Message\StatusCodeInterface;

class GetAllBooksController
{
    public function __construct(
        private GetAllBooks $getAllBooks,
        // private JsonRenderer $renderer
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->getAllBooks->execute();

        // return $this->renderer->json($response, $data, StatusCodeInterface::STATUS_OK);
        return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
