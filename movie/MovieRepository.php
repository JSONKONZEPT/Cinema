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
        Movie::createFromArry
        return $json;
    }

    public function createFromArray($json)
    {
        foreach($json as screening){
        $movie =  new Movie$this->setblabla()
    }

        foreach $movie->times
                $movie->screening[] = new Screening
}

}