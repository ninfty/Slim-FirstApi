<?php

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class JsonMiddleware implements Middleware
{
    public function process(Request $request, RequestHandler $handler): Response
    {
        $request = $request->withHeader('Accept', 'application/json');

        return $handler->handle($request);
    }
}