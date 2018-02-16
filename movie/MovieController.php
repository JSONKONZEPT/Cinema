<?php

class MovieController {

    private $view;
    private $repo;
    private $movieList;

    public function __construct()
    {
        $this->view = new MovieView();
        $this->repo = new MovieRepository();
    }

    public function displayMovies() {
        if(!isset($this->movieList)) {

            $this->movieList = $this->repo->readMovieList();
        }
        $this->view->displayMovieList($this->movieList);
    }

    public function chooseMovie()
    {

    }

}