<?php

namespace TsApi\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use TsApi\Support\Contracts\TmdbInterface;

class HomeController 
{
    private $tmdbClient;

    public function __construct(TmdbInterface $client)
    {
        $this->tmdbClient = $client;
    }
    
    public function index(Request $request, Response $response) 
    {
        $page = $request->getQueryParam('page') ? $request->getQueryParam('page') : '1';
        $movie = $this->tmdbClient->getAllMovies($page);
        return json_decode($movie);
    }
    

    public function getById(Request $request, Response $response) 
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');

        $movie = $this->tmdbClient->getMovieById($id);
        return json_decode($movie);
    }
    

    public function search(Request $request, Response $response) 
    {
        $search = $request->getQueryParam('search');
        
        $movie = $this->tmdbClient->search($search);
        return json_decode($movie);
    }    
    

    public function getGenreMovieList() 
    {
        $movie = $this->tmdbClient->getGenreMovieList();
        return json_decode($movie);
    }    
}
