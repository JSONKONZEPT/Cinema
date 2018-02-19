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
        $reservationView = new ReservationView();

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
                    break;

                case 2:
                    $reservationController->displayReservations();
                    $reservationView->cancelReservation('data/reservations.json');
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