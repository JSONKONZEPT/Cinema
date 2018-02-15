<?php

class CinemaController {

    private $view;

    public function __construct()
    {
       $this->view = new CinemaView;
    }

    public function run()
    {
        $movieController = new MovieController();
        $reservationController = new ReservationController();

        do{
            $command = $this->view->getCommand();
            switch($command){
                case '0':
                    $movieController->displayMovies();
                    break;

                case 1:
                    $movieController->displayMovies();
                    $movieController->chooseMovie();
                    $reservationController->getReservationFromUser();
                    $reservationController->calculateAvailableSeats();
                    break;

                case 2:

                    break;

                case 3:
                    $reservationController->displayReservations();
                    break;

                case 'x':

                    break;

                default:

                    echo "Please enter 0, 1, 2 or 3\n";
                    break;
            }
        }
        while('x' != $command);
    }

}