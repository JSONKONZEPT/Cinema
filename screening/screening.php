<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 11:24
 */

class Screening
{
    protected $seats = [];
    private $hall;
    private $time;
    private $movie;
    private $freeSeats = 150;

    /**
     * @param mixed $movie
     * @return Screening
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @param mixed $hall
     * @return Screening
     */
    public function setHall($hall)
    {
        $this->hall = $hall;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     * @return Screening
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }


    public function createSeats()
    {
        for ($j = 1; $j <= 10; $j++) {
            $row = [];
            for ($i = 1; $i <= 15; $i++) {
                $row[$i] = true;
            }
            $this->seats[$j] = $row;
        }

    }

    public function countFreeSeats()
    {
        return $this->freeSeats;
    }

    public static function create($time, $hall, $movie) {
        $screening = new Screening;

        $screening->setTime($time);
        $screening->setHall($hall);
        $screening->setMovie($movie);
        $screening->createSeats();
        return $screening;



    }

    public function reserveSeats($seatCount) {
        $this->freeSeats -= $seatCount;
        return $this->freeSeats;
    }

}