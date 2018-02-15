<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 19:44
 */

class MovieRepository
{
    private $movieListFilename = "data/movies.json";

    public function __construct()
    {

    }

    public function readMovieList()
    {
        $string = file_get_contents($this->movieListFilename);
        $json = json_decode($string, true);
        return $json;
    }

}