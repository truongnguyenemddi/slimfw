<?php

declare(strict_types=1);

namespace App\Application\Routes;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\PhpRenderer;
use App\Application\Middleware\AuthMiddleware;
use App\Application\Middleware\GuestMiddleware;
use App\Application\Middleware\ViewErrorMiddleware;

class ViewRoutes
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(App $app): void
    {
        $renderer = $this->renderer;
        
        $app->group('', function (Group $group) use ($renderer) {
            /*** START - Public routes ***/

            // Login page
            $group->get('/login', fn($request, $response) => 
                $renderer->render($response, 'pages/auth/Login.php')
            )->add(GuestMiddleware::class);

            // About page
            $group->get('/about', fn($request, $response) => 
                $renderer->render($response, 'pages/landing/About.php')
            );

            /*** END - Public routes ***/



            /*** START - Protected routes ***/

            $group->group('', fn(Group $group) => [
                // Home page
                $group->get('/', fn($request, $response) => 
                    $renderer->render($response, 'pages/home/index.php', ['title' => 'Home'])
                ),
            ])->add(AuthMiddleware::class);

            /*** END - Protected routes ***/
        })->add(ViewErrorMiddleware::class);
    }
}