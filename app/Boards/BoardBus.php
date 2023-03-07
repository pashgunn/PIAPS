<?php

namespace App\Boards;

use App\Drivers\BusDriver;
use App\Drivers\Driver;

class BoardBus extends BoardAnyCar
{
    public static int $capacity = 30;

    public function __construct()
    {
        $this->currentPassengerCount = 0;
        $this->type = 'Bus';
        $this->category = 'A';
        $this->passengerType = 'Bus passenger';
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
            echo 'Bus driver sat in bus' . PHP_EOL;
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
                if ($passengers[$i]->getType() === 'Bus passenger') {
                    $this->passengers[] = $passengers[$i];
                    $this->currentPassengerCount++;
                    echo "Passenger sat into bus. Seats left in bus: " . self::$capacity-$this->currentPassengerCount . PHP_EOL;
                } else {
                    echo "Passenger type be must 'bus'" . PHP_EOL;
                }
            }
            if ($this->currentPassengerCount == self::$capacity) {
                echo "The bus is full of passengers" . PHP_EOL;
                $tripCount++;
                $this->currentPassengerCount = 0;
            }
        }
    }

    public function boardBus(array $passengers)
    {
        $this->boardDriver(BusDriver::getInstance());
        $this->boardPassengers($passengers);
    }
}