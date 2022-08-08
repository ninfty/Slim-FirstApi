<?php

use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Controller\CreateBookController;
use App\Application\Controller\GetAllBooksController;
use App\Application\Controller\GetBookController;
use App\Application\Controller\UpdateBookController;
use App\Application\Controller\DeleteBookController;

$app->group('/books', function (Group $group) {
    $group->get('', GetAllBooksController::class);
    $group->post('', CreateBookController::class);
    $group->get('/{id}', GetBookController::class);
    $group->put('/{id}', UpdateBookController::class);
    $group->delete('/{id}', DeleteBookController::class);
});
