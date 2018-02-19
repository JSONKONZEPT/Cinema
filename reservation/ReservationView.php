<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 20:45
 */

class ReservationView
{

    protected $filename = 'data/reservations.json';

    public function getReservationFromUser(array $movie_list) {

        print 'Which movie (number): ';
        $movieId = readline();

        $movie = $movie_list[$movieId];
        printf("\nTitle: %s\nDuration: %s\nFSK: %d\n\n", $movie->getTitle(), $movie->getDuration(), $movie->getFsk());

        $reservation = new Reservation();
        $reservation->setMovie($movieId);


        print "\n";
        $screenings = $movie->getScreenings();
        foreach ($screenings as $i=> $screening) {
            printf("%d) Time: %s \nFree seats: %d\n-----------------------\n", $i, $screening->getTime(), $screening->countFreeSeats());
        }
        print "\n";

        print 'At what time (number): ';
        $reservation->setTime(readline());
        $screening = $screenings[$reservation->getTime()];
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

        $screening->reserveSeats($seats);

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

    public function cancelReservation($filename) {
        $string = file_get_contents($filename);
        $json = json_decode($string);

        print "Which reservation do you want cancel? (Id): ";
        $cancelReservation = readline();

        array_splice($json, $cancelReservation, 1);

        file_put_contents($filename, (json_encode($json)));
    }

}