<?php

namespace App\Application\Routes;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Actions\Auth\LoginAction;
use App\Application\Actions\Auth\LogoutAction;
use App\Application\Middleware\AuthMiddleware;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;

class ApiRoutes
{
    public function __invoke(App $app): void
    {
        $app->group('/api', function ($api) {
            /* Public routes */
            $api->post('/login', LoginAction::class);

            /* Protected routes */
            $api->group('', function (Group $group) {
                $group->post('/logout', LogoutAction::class);
                $group->group('/users', function (Group $group) {
                    $group->get('', ListUsersAction::class);
                    $group->get('/{id}', ViewUserAction::class);
                });
            })->add(AuthMiddleware::class);
        });
    }
}