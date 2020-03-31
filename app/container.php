<?php

use Interop\Container\ContainerInterface;
use function DI\get;
use TsApi\Support\Tmdb;
use TsApi\Support\Contracts\TmdbInterface;

return [
    'router' => get(Slim\Router::class),
    TmdbInterface::class => function(ContainerInterface $c) {
        return new Tmdb;
    }
];
