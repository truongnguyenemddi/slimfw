<?php

declare(strict_types=1);

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
        $app->group('/api', fn($api) => [
            /*** START - Public routes ***/

            // login
            $api->post('/login', LoginAction::class),

            /*** END - Public routes ***/



            /*** START - Protected routes ***/

            $api->group('', fn(Group $group) => [
                // auth
                $group->post('/logout', LogoutAction::class),

                // user
                $group->group('/users', fn(Group $group) => [
                    $group->get('', ListUsersAction::class),
                    $group->get('/{id}', ViewUserAction::class),
                ]),
            ])->add(AuthMiddleware::class),

            /*** END - Protected routes ***/
        ]);
    }
}