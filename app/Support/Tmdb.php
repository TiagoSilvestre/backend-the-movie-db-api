<?php

namespace TsApi\Support;

use TsApi\Support\Contracts\TmdbInterface;

class Tmdb implements TmdbInterface
{
    private $urlTmdb = 'https://api.themoviedb.org/3/';
    private $tokenTmbd = '1f54bd990f1cdfb230adb312546d765d';

    public function getAllMovies($page)
    {
        $url = $this->urlTmdb . "movie/upcoming?page={$page}&api_key=" . $this->tokenTmbd;
        return $this->curlGet($url);
    }
 

    public function getMovieById($id)
    {
        $url = $this->urlTmdb . "movie/{$id}?api_key=" . $this->tokenTmbd;
        return $this->curlGet($url);
    }


    public function search($search)
    {
        $url = $this->urlTmdb . "search/movie?query={$search}&api_key=" . $this->tokenTmbd;
        return $this->curlGet($url);
    }

    public function getGenreMovieList()
    {
        $url = $this->urlTmdb . "genre/movie/list?api_key=" . $this->tokenTmbd;
        return $this->curlGet($url);
    }


    public function curlGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $retorno = curl_exec($ch);
        curl_close($ch);

        return $retorno;
    }


}
