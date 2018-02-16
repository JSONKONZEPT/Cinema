<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 20:45
 */

class ReservationController
{
    private $view;
    private $movieRepo;
    private $reservationRepo;

    public function __construct()
    {
        $this->reservationRepo = new ReservationRepository();
        $this->movieRepo = new MovieRepository();
        $this->view = new ReservationView();
    }

    public function getReservationFromUser()
    {
        $movie_list = $this->movieRepo->readMovieList();
        $reservation = $this->view->getReservationFromUser($movie_list);
        $this->reservationRepo->saveReservation($reservation);
    }

    public function displayReservations() {
        $reservations = $this->reservationRepo->readReservations();
        $this->view->displayReservations($reservations);
    }




}