<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use App\Application\Middleware\ViewErrorMiddleware;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;
use Slim\Psr7\Factory\ResponseFactory;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        PDO::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $dbSettings = $settings->get('db');

            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                $dbSettings['host'],
                $dbSettings['dbname'],
                $dbSettings['charset']
            );

            $pdo = new PDO($dsn, $dbSettings['user'], $dbSettings['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        },
        PhpRenderer::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $viewSettings = $settings->get('view');
            
            $renderer = new PhpRenderer($viewSettings['template_path']);
            $renderer->setLayout('layouts/main-layout.php');
            
            return $renderer;
        },
        ViewErrorMiddleware::class => function (ContainerInterface $c) {
            return new ViewErrorMiddleware(
                new ResponseFactory(),
                $c->get(PhpRenderer::class)
            );
        },
    ]);
};
