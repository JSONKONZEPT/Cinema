<?php

class MovieController {

    private $view;
    private $repo;

    public function __construct()
    {
        $this->view = new MovieView();
        $this->repo = new MovieRepository();
    }

    public function displayMovies() {
        $movie_list = $this->repo->readMovieList();
        $this->view->displayMovieList($movie_list);
    }

    public function chooseMovie()
    {

    }

}