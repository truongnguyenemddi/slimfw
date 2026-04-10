<?php

declare(strict_types=1);

use Slim\App;
use App\Application\Routes\ViewRoutes;
use App\Application\Routes\ApiRoutes;

return function (App $app) {
    $container = $app->getContainer();
    $container->get(ApiRoutes::class)($app);
    $container->get(ViewRoutes::class)($app);
};
