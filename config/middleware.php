<?php

use Slim\App;
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

    $app->addErrorMiddleware(
        filter_var($_ENV['DISPLAY_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN), 
        filter_var($_ENV['LOG_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN),
        filter_var($_ENV['LOG_ERRORS'], FILTER_VALIDATE_BOOLEAN),
    $logger);
};