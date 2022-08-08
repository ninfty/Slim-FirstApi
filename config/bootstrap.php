<?php

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('..');
$dotenv->load();

$containerBuilder = new ContainerBuilder();

$settings = require __DIR__ . '/../config/settings.php';
$settings($containerBuilder);

$dependencies = require __DIR__ . '/../config/dependencies.php';
$dependencies($containerBuilder);

$repositories = require __DIR__ . '/../config/repositories.php';
$repositories($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

$middleware = require __DIR__ . '/../config/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

// (require __DIR__ . '/../config/routes/index.php')($app);
// (require __DIR__ . '/../config/routes/book.php')($app);

return $app;