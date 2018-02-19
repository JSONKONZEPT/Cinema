<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 19:48
 */

class MovieView
{
    public function displayMovieList(array $movie_list)
    {
        for ($i = 0; $i < count($movie_list); $i++) {
            $movie = $movie_list[$i];

            print $i . ")\n" . "======================================\nMovie: " . $movie->getTitle() . "\nDuration: " . $movie->getDuration() . "\nFSK: " . $movie->getFsk() . "\n=====================================\n\n";
        }
    }
}