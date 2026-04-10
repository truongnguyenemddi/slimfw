<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Slim\Psr7\Response as SlimResponse;
use Slim\Views\PhpRenderer;

class GuestMiddleware
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Handler $handler): Response
    {
        $session = $request->getAttribute('session');
        if (isset($session['user_id'])) {
            $response = new SlimResponse();
            return $response->withHeader('Location', '/')->withStatus(302);
        }

        $this->renderer->setLayout('');
        
        return $handler->handle($request);
    }
}