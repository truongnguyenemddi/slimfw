<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class SessionMiddleware implements Middleware
{
    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        $hasSessionCookie = isset($_COOKIE[session_name()]);
        $hasAuthHeader = isset($_SERVER['HTTP_AUTHORIZATION']);
        if ($hasAuthHeader || $hasSessionCookie) {
            if (session_status() === PHP_SESSION_NONE) session_start();
            $request = $request->withAttribute('session', $_SESSION);
            session_write_close();
        }

        return $handler->handle($request);
    }
}
