<?php

namespace TsApi\Support\Contracts;

interface TmdbInterface 
{
    public function getAllMovies($page);
    public function getMovieById($id);
    public function search($search);
    public function getGenreMovieList();
}
