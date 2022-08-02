<?php

namespace App\Application\Renderer;

use Psr\Http\Message\ResponseInterface as Response;

class JsonRenderer
{
    public function json(Response $response, mixed $data, int $statusCode): Response
    {
        $json = json_encode($data);
        $response->getBody()->write($json);

        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($statusCode);
    }
}