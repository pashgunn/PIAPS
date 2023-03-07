<?php

namespace App\Passengers;

abstract class Passenger
{
    protected string $type;

    public function getType(): string
    {
        return $this->type;
    }
}