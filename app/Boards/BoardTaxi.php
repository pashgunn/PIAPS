<?php

namespace App\Boards;

use App\Drivers\Driver;
use App\Drivers\TaxiDriver;

class BoardTaxi extends BoardAnyCar
{
    public static int $capacity = 4;

    public function __construct()
    {
        $this->currentPassengerCount = 0;
        $this->type = 'Taxi';
        $this->category = 'B';
        $this->passengerType = 'Taxi passenger';
    }

    public static function getCapacity(): int
    {
        return self::$capacity;
    }

    public function boardDriver(Driver $driver): void
    {
        if ($driver->getCategory() !== $this->category) {
            echo 'Driver doesnt have required drive category' . PHP_EOL;
        } else {
            $this->driver = $driver;
            echo 'Taxi driver sat in taxi' . PHP_EOL;
        }
    }

    public function boardPassengers(array $passengers): void
    {
        $tripCount = 0;

        for ($i = 0; $i < count($passengers); $i++) {
            if ($this->currentPassengerCount == 0) {
                echo "Trip #" . $tripCount+1 . PHP_EOL;
            }
            if ($this->currentPassengerCount < self::$capacity) {
                if ($passengers[$i]->getType() === 'Taxi passenger') {
                    $this->passengers[] = $passengers[$i];
                    $this->currentPassengerCount++;
                    echo "Passenger sat into taxi. Seats left in taxi: " . self::$capacity-$this->currentPassengerCount . PHP_EOL;
                } else {
                    echo "Passenger type be must 'taxi'" . PHP_EOL;
                }
            }
            if ($this->currentPassengerCount == self::$capacity) {
                echo "The taxi is full of passengers" . PHP_EOL;
                $tripCount++;
                $this->currentPassengerCount = 0;
            }
        }
    }

    public function boardTaxi(array $passengers)
    {
        $this->boardDriver(TaxiDriver::getInstance());
        $this->boardPassengers($passengers);
    }
}