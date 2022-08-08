<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response, $args) {
    $data = array('message' => 'hi!');
    $payload = json_encode($data);

    $response->getBody()->write($payload);

    return $response
        ->withHeader('Content-Type', 'application/json');
});

