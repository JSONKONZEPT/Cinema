<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 19:30
 */

class CinemaView
{
    protected $menu = [
        'Movies',
        'New reservation',
        'Cancel reservation',
        'List reservations'
    ];

    public function getCommand(): string
    {
        print "-------------------------\n";
        foreach($this->menu as $i => $label) {
            printf("%d) %s\n", $i, $label);
        }
        print "\nx) End Program\n";

        do {
            print "Cmd: ";
            $command = readline();
        }
        while('x' != $command && !in_array($command, [0,1,2,3,4,5,'x']));
        return $command;
    }

}