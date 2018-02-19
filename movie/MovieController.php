<?php

class MovieController {

    protected $view;
    protected $repo;
    protected $movieList;
    protected $movie;
    protected $duration;
    protected $fsk;
    protected $filename = 'data/movies.json';

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

    public function addMovies()
    {
        print 'Movie name: ';
        $this->setMovie(readline());
        print 'Duration: ';
        $this->setDuration(readline());
        print 'Fsk: ';
        $this->setFsk(readline());

        return $this;
    }

    public function fromJson($filename)
    {
        $string = file_get_contents($filename);
        $json = json_decode($string);
        return $json;
    }

    public function toArray(): array
    {
        return [
            'movie'=>$this->movie,
            'duration'=>$this->duration,
            'fsk'=>$this->fsk,
            'time'=>["10:00","14:00","18:00","22:00"]
        ];
    }

    public function pushIt($json)
    {

        array_push($json, $this->toArray());
        return $json;

    }

    public function toJson()
    {
        return json_encode($this->pushIt($this->fromJson($this->filename)));
    }

    public function save(string $filename): MovieController
    {
        file_put_contents($filename, $this->toJson());
        return $this;
    }

    public function chooseMovie()
    {

    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param mixed $movie
     * @return MovieController
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     * @return MovieController
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFsk()
    {
        return $this->fsk;
    }

    /**
     * @param mixed $fsk
     * @return MovieController
     */
    public function setFsk($fsk)
    {
        $this->fsk = $fsk;
        return $this;
    }



}