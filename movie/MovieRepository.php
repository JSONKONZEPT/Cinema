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
        $movieData = json_decode($string, true);
        return $this->createFromArray($movieData);
    }

    public function createFromArray($movieData)
    {
        $movies = [];
        foreach ($movieData as $key=>$value) {
            $movie = Movie::createFromArray($value);
            $movies[] = $movie;

            foreach($value["time"] as $time) {
                print "--------------------------------\n";
                var_dump($movie->getTitle());
                var_dump($movie->getTitle());
                var_dump($time);
            }
//            $movies = new Reservation;
//            $ = $movies->getMovie();
//
//
//            foreach ($movie->time as $) {
//                $movie->screening[] = new Screening;
//            }
        }
        return $movies;
    }

}