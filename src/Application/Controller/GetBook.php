<?php

namespace App\Application\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Infrastructure\Repository\BookRepository;

class GetBook
{
    public function __construct(
        private BookRepository $bookRepository
    ) { }

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->bookRepository->findAllBooks();
        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
