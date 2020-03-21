<?php

use Interop\Container\ContainerInterface;
use function DI\get;

return [
    'router' => get(Slim\Router::class)
];
