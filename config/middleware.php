<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use App\Application\Middleware\JsonMiddleware;

return function (App $app) {
    $app->addBodyParsingMiddleware();
    $app->addRoutingMiddleware();
    $app->add(JsonMiddleware::class);
    $app->addErrorMiddleware(true, true, true);
};