<?php
/**
 * Created by PhpStorm.
 * User: Jason Conzett
 * Date: 15.02.2018
 * Time: 11:24
 */

class Screening
{
    protected $seats = [];


    public function createSeats()
    {
        for ($j = 1; $j <= 10; $j++) {
            $row = [];
            for ($i = 1; $i <= 15; $i++) {
                $row[$i] = true;
            }
            $this->seats[$j] = $row;
        }

    }

    public function countFreeSeats()
    {
        $free = 0;
        $seats = $this->seats;

        foreach($seats as $row) {
            foreach ( $row as $seat) {
                if ($seat == true) {
                    $free += 1;
                }
            }
        }
        print $free;
        return $free;
    }



}