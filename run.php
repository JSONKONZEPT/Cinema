<?php
/**
 * Created by PhpStorm.
 * User: Elio
 * Date: 14.02.2018
 * Time: 07:53
 */

require_once 'movie/MovieController.php';
require_once 'movie/MovieView.php';
require_once 'movie/MovieRepository.php';
require_once 'cinema/CinemaController.php';
require_once 'cinema/CinemaView.php';
require_once 'cinema/Cinema.php';
require_once 'reservation/ReservationController.php';
require_once 'reservation/ReservationRepository.php';
require_once 'reservation/ReservationView.php';
require_once 'reservation/Reservation.php';
require_once 'Screening.php';

//$movie = new Movie;
//
//$movie->readFile("movies.json");

$cinema = new CinemaController();

$cinema->run();


/*
$count = new Screening;

$count->createSeats();

$count->countFreeSeats();
*/