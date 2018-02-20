<?php

class CinemaController {

    protected $view;

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
                    $movieController->addMovies();
                    $movieController->save('data/movies.json');
                    break;

                case 2:
                    $movieController->displayMovies();
                    $movieController->chooseMovie();
                    $reservationController->getReservationFromUser();
                    break;

                case 3:
                    $reservationController->displayReservations();
                    $reservationView->cancelReservation('data/reservations.json');
                    break;

                case 4:
                    $reservationController->displayReservations();
                    break;

                case 5:
                    $movieController->searchMovie($movieController->fromJson('data/movies.json'));
                    break;

                case 'x':

                    break;

                default:

                    echo "Please enter 0, 1, 2, 3, 4, 5 or x\n";
                    break;
            }
        }
        while('x' != $command);
    }

}