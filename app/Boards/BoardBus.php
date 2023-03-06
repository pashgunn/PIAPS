<?php

namespace App\Boards;

use App\Drivers\Driver;


class BoardBus extends BoardAnyCar
{
    public function __construct()
    {
        $this->currentPassengerCount = 0;
        $this->type = 'Bus';
        $this->category = 'A';
        self::$capacity = 30;
        $this->passengerType = 'Bus passenger';
    }

    public function boardDriver(Driver $driver): void
    {
        if ($driver->getCategory() !== $this->category) {
            echo 'Driver doesnt have required drive category';
        } else {
            $this->driver = $driver;
            echo 'Bus driver sat in bus';
        }
    }

    public function boardPassengers(array $passengers): void
    {
        foreach ($passengers as $passenger) {
            if ($this->currentPassengerCount < self::$capacity) {
                if ($passenger->type === 'Bus passenger') {

                }
            }
        }
    }

    public function boardBus()
    {

    }
}