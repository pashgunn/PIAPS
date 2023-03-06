<?php

namespace App\Passengers;

class BusPassenger extends Passenger
{
    public function __construct()
    {
        $this->type = 'Bus passenger';
    }
}