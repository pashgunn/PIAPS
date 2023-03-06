<?php

namespace App\Passengers;

class TaxiPassenger extends Passenger
{
    public function __construct()
    {
        $this->type = 'Taxi passenger';
    }
}