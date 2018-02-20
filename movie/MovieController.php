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

    public function searchMovie($json)
    {


        print "Search a movie (movie name): ";
        $search = readline();

        for($i = 0; $i < count($json); $i++) {
            if (in_array($search, $json[$i])) {
                print "Movie exists!\n";
            }
        }
    }

    public function addMovies()
    {
        print 'Movie name: ';
        $this->setMovie(readline());
        print 'Duration (hh)h (mm)min: ';
        $this->setDuration(readline());
        do {
            print 'Fsk: ';
            $this->setFsk(readline());
        }while(!preg_match('/^[1]{1}[0-8]{1}$/', $this->fsk));

        return $this;
    }

    public function fromJson($filename)
    {
        $string = file_get_contents($filename);
        $json = json_decode($string, true);
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

    public function pushIn($json)
    {

        array_push($json, $this->toArray());
        return $json;

    }

    public function toJson()
    {
        return json_encode($this->pushIn($this->fromJson($this->filename)));
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