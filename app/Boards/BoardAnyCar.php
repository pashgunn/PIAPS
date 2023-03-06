<?php

namespace App\Boards;

use App\Drivers\Driver;
use App\Passengers\Passenger;

abstract class BoardAnyCar
{
    protected string $type;
    protected string $category;
    protected Driver $driver;
    public static int $capacity;
    protected string $passengerType;
    protected int $currentPassengerCount;
    protected Passenger $passengers;

    abstract public function boardDriver(Driver $driver): void;
    abstract public function boardPassengers(array $passengers): void;
    abstract public static function getCapacity(): int;
}
