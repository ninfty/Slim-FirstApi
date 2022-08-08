<?php

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Application\Controller\CreateBookController;
use App\Application\Controller\GetAllBooksController;
use App\Application\Controller\GetBookController;

return function (App $app) {

    $app->get('/', function (Request $request, Response $response, $args) {
        $data = array('message' => 'hi!');
        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json');
    });

    $app->group('/books', function (Group $group) {
        $group->get('', GetAllBooksController::class);
        $group->get('/{id}', GetBookController::class);
        $group->post('', CreateBookController::class);
    });
};
