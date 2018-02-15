<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 20:45
 */

class ReservationRepository
{
    private $reservationFilename = "data/reservations.json";

    public function readReservations() {
        $reservations = file_get_contents($this->reservationFilename);
        $reservations = json_decode($reservations);
        return $reservations;
    }

    public function saveReservation($reservation)
    {
        $reservations = $this->readReservations();
        $reservations[] = $reservation->toArray();
        $json = json_encode($reservations);
        file_put_contents($this->reservationFilename, $json);
    }
}