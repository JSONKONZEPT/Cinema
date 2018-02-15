<?php

class Reservation
{
    protected $firstname;
    protected $lastname;
    protected $seats;
    protected $adult;
    protected $children;
    protected $movie;
    protected $day = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    protected $time;
    protected $filename = 'movies.json';


    public static function createFromConsole(): Reservation
    {
        $instance = new Reservation;
        print 'Which day (number): ';
        $instance->setTime(readline());
        print 'At what time (number): ';
        $instance->setTime(readline());
        print 'Firstname: ';
        $instance->setFirstname(readline());
        print 'Lastname: ';
        $instance->setLastname(readline());
        return $instance;
    }

    public function whichMovie($filename): Reservation
    {
        $string = file_get_contents($filename);
        $json = json_decode($string, true);

        print 'Which movie (number): ';
        $this->setMovie(readline());

        $movie = $json[$this->getMovie()];
        printf("\nTitle: %s\nDuration: %s\nFSK: %d\nHall: %d\n\n", $movie['movie'], $movie['duration'], $movie['fsk'], $movie['hall']);

        printf("%s\n%s\n%s\n%s\n%s\n%s\n\n", $this->day[0], $this->day[1], $this->day[2], $this->day[3], $this->day[4], $this->day[5]);

        return $this;
    }

    public function calcSeats(): Reservation
    {
        $instance = new Reservation;

        do {
            print 'How many seats: ';
            $instance->setSeats(readline());
            $seats = $instance->getSeats();
            print 'How many adults (16+): ';
            $instance->setAdult(readline());
            $adults = $instance->getAdult();
            print 'How many children (under 16): ';
            $instance->setChildren(readline());
            $children = $instance->getChildren();
        } while ($seats != $adults + $children);

        $price = ($adults * 18) + ($children * 15);
        echo "\nPrice: " . $price . " Fr. \n";

        return $instance;

    }

    /**
     * @return string
     */
    public function getMovie(): string
    {
        return $this->movie;
    }

    /**
     * @param string $movie
     * @return Reservation
     */
    public function setMovie(string $movie): Reservation
    {
        $this->movie = $movie;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Reservation
     */
    public function setFirstname(string $firstname): Reservation
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Reservation
     */
    public function setLastname(string $lastname): Reservation
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeats(): int
    {
        return $this->seats;
    }

    /**
     * @param int $seats
     * @return Reservation
     */
    public function setSeats(int $seats): Reservation
    {
        $this->seats = $seats;
        return $this;
    }

    /**
     * @return int
     */
    public function getAdult(): int
    {
        return $this->adult;
    }

    /**
     * @param int $adult
     * @return Reservation
     */
    public function setAdult(int $adult): Reservation
    {
        $this->adult = $adult;
        return $this;
    }

    /**
     * @return int
     */
    public function getChildren(): int
    {
        return $this->children;
    }

    /**
     * @param int $children
     * @return Reservation
     */
    public function setChildren(int $children): Reservation
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * @param string $day
     * @return Reservation
     */
    public function setDay(string $day): Reservation
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @return array
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return Reservation
     */
    public function setTime(string $time): Reservation
    {
        $this->time = $time;
        return $this;
    }


}