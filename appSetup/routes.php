<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use App\Application\Routes\ViewRoutes;
use App\Application\Routes\ApiRoutes;

return function (App $app) {
    $container = $app->getContainer();
    $container->get(ApiRoutes::class)($app);
    $container->get(ViewRoutes::class)($app);
};
