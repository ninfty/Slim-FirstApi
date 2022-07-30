<?php

namespace App\Application\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\GetAllBooks;

class GetAllBooksController
{
    public function __construct(
        private GetAllBooks $getAllBooks
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->getAllBooks->execute();
        
        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
