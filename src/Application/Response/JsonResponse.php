<?php

namespace App\Application\Response;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class JsonResponse
{
    public function response(Response $response, $data, int $statusCode): Response
    {
        $json = json_encode($data);
        $response->getBody()->write($json);

        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($statusCode);
    }
}