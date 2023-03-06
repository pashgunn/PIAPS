<?php

namespace App\Boards;

use App\Drivers\Driver;

class BoardTaxi extends BoardAnyCar
{

    public function __construct()
    {
        $this->currentPassengerCount = 0;
        $this->type = 'Taxi';
        $this->category = 'B';
        $this->passengerType = 'Taxi passenger';
    }

    public function getCapacity(): int
    {
        return self::$capacity = 4;
    }

    public function boardDriver(Driver $driver): void
    {
        if ($driver->getCategory() !== $this->category) {
            echo 'Driver doesnt have required drive category';
        } else {
            $this->driver = $driver;
            echo 'Taxi driver sat in taxi';
        }
    }

    public function boardPassengers(array $passengers): void
    {
        foreach ($passengers as $passenger) {
            if ($this->currentPassengerCount < self::$capacity) {
                if ($passenger->type === 'Taxi passenger') {

                }
            }
        }
    }

    public function boardTaxi()
    {

    }
}