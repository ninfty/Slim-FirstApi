<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use App\Application\Middleware\JsonMiddleware;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

return function (App $app) {
    $logger = new Logger('app');
    $streamHandler = new StreamHandler(__DIR__ . '/../logs/app.log', 100);
    $logger->pushHandler($streamHandler);

    $app->addBodyParsingMiddleware();
    $app->addRoutingMiddleware();
    $app->add(JsonMiddleware::class);
    $app->addErrorMiddleware(true, true, true, $logger);
};