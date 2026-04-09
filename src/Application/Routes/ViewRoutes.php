<?php

namespace App\Application\Routes;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Middleware\AuthMiddleware;

class ViewRoutes
{
    public function __invoke(App $app): void
    {
        /* Public routes */
        $app->get('/login', function ($request, $response) {
            $response->getBody()->write("Login Page");
            return $response;
        });

        /* Protected routes */
        $app->group('', function (Group $group) {
            $group->get('/', function ($request, $response) {
                $response->getBody()->write("Dashboard");
                return $response;
            });
        })->add(AuthMiddleware::class);
    }
}