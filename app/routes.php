<?php

$app->add(new \Tuupola\Middleware\Cors([
        "origin" => "*",
        "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
        "headers.allow" => [],
        "headers.expose" => [],
        "credentials" => false,
        "cache" => 0,
        "error" => null
    ]));

$app->group('/api', function() use ($app) {
    $app->get('/movies', ['TsApi\\Controllers\\HomeController', 'index']);
    $app->get('/movie/{id}',  ['TsApi\\Controllers\\HomeController', 'getById']);
    $app->get('/search/movie',  ['TsApi\\Controllers\\HomeController', 'search']);
    $app->get('/genre/movie/list',  ['TsApi\\Controllers\\HomeController', 'getGenreMovieList']);
});
