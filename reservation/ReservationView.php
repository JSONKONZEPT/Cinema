<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 20:45
 */

class ReservationView
{
    private $day = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    public function getReservationFromUser(array $movie_list) {

        print 'Which movie (number): ';
        $movieId = readline();

        $movie = $movie_list[$movieId];
        printf("\nTitle: %s\nDuration: %s\nFSK: %d\n\n", $movie->getTitle(), $movie->getDuration(), $movie->getFsk());

//        for ($i = 0; $i < count($this->day); $i++) {
//            printf("%d %s\n", $i, $this->day[$i]);
//        }
//        print "\n";

        $reservation = new Reservation();
        $reservation->setMovie($movieId);
        var_dump($movie);
//
//        print 'Which day (number): ';
//        $reservation->setDay(readline());

        print "\n";
        foreach ($movie->getScreenings() as $i=>$screening) {
            printf("%d %s Free seats: %d\n", $i, $screening->getTime(), $screening->countFreeSeats());
        }
        print "\n";

        print 'At what time (number): ';
        $reservation->setTime(readline());
        print 'Firstname: ';
        $reservation->setFirstname(readline());
        print 'Lastname: ';
        $reservation->setLastname(readline());

        do {
            print 'How many seats: ';
            $reservation->setSeats(readline());
            $seats = $reservation->getSeats();
            print 'How many adults (16+): ';
            $reservation->setAdult(readline());
            $adults = $reservation->getAdult();
            print 'How many children (under 16): ';
            $reservation->setChildren(readline());
            $children = $reservation->getChildren();
        } while ($seats != $adults + $children);

        $price = ($adults * 18) + ($children * 15);
        echo "\nPrice: " . $price . " Fr. \n";

        return $reservation;
    }

    public function displayReservations($reservations) {
        for ($i = 0; $i < count($reservations); $i++) {
            $r = $reservations[$i];
            // TODO format correctly
            printf("\n\n%d)\nMovie: %s\nFirstname: %s\nLastname: %s\nSeats: %d\n", $i, $r->movie, $r->firstname, $r->lastname, $r->seats);
        }
        print "\n\n";
    }

}