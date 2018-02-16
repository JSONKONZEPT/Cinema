<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 13.02.2018
 * Time: 13:11
 */

class Movie
{

    protected $title = "";
    protected $duration = "";
    protected $fsk = "";
    private $screenings = [];

    /**
     * @return array
     */
    public function getScreenings(): array
    {
        return $this->screenings;
    }

    /**
     * @param array $screenings
     * @return Movie
     */
    public function addScreening(Screening $screening): Movie
    {
        $this->screenings[] = $screening;
        return $this;
    }


    public static function createFromConsole(): Movie
    {
        $instance = new Movie();
        print 'Titel des Filmes :';
        $instance->setTitle(readline());
        print 'Länge des Filmes :';
        $instance->setDuration(readline());
        print 'Alterseinstufung :';
        $instance->setFsk(readline());
        return $instance;

    }


    public static function createFromArray($array): Movie
    {
        $instance = new Movie();
        $instance->setTitle($array["movie"]);
        $instance->setDuration($array["duration"]);
        $instance->setFsk($array["fsk"]);
        return $instance;
    }

    /**
     * @return string
     */
    public function getFsk(): string
    {
        return $this->fsk;
    }

    /**
     * @param string $fsk
     */
    public function setFsk(string $fsk)
    {
        $this->fsk = $fsk;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration(string $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function toArray(): array
    {

        return [
            'title' => $this->title,
            'duration' => $this->duration,
            'fsk' => $this->fsk
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toString(): string
    {
        return sprintf(
            "Titel: %s \nDauer: %s \nAlterseinstufung: %d",
            $this->title,
            $this->duration,
            $this->fsk

        );
    }

    public function save(string $filename): Movie
    {
        file_put_contents($filename, $this->toJson());
        return $this;
    }
}