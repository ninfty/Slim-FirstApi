<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\DeleteBook;
use Fig\Http\Message\StatusCodeInterface;

class DeleteBookController
{
    public function __construct(
        private DeleteBook $deleteBook,
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    { 
        $this->deleteBook->execute($args['id']);

        return $response->withJson([
            'message' => 'Book deleted'
        ], StatusCodeInterface::STATUS_OK);
    }
}
