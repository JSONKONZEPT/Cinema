<?php
/**
 * Created by PhpStorm.
 * User: Elio
 * Date: 13.02.2018
 * Time: 10:05
 */

class Cinema
{
    protected $menu = [
        'Movies',
        'New reservation',
        'Cancel reservation',
        'List reservations'
    ];

    public function run(): Cinema
    {
        $instance = new Movie;
        $instance1 = new Reservation;

        do{
            $command = $this->getCommand();
            switch($command){
                case '0':
                    print $instance->readFile("movies.json");
                    break;

                case 1:
                    print $instance->readFile("movies.json");
                    $instance1->whichMovie("movies.json");
                    $instance1->createFromConsole();
                    $instance1->calcSeats();
                    break;

                case 2:

                    break;

                case 3:

                    break;

                case 'x':

                    break;

                default:

                    echo "Please enter 0, 1, 2 or 3\n";
                    break;
            }
        }
        while('x' != $command);

        return $this;
    }



}