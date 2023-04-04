<?php

namespace App\PrimitiveObjects;

use App\Component;
use Exception;

class Passenger extends Component
{
    protected string $name;
    protected float $baggageWeight;

    public function __construct(string $name, $baggageWeight)
    {
        $this->name = $name;
        $this->baggageWeight = $baggageWeight;
    }

    public function add(Component $component)
    {
        throw new Exception("Can't add to a primitive object");
    }

    public function remove(Component $component)
    {
        throw new Exception("Can't delete from a primitive object");
    }

    public function getBaggageWeight()
    {
        return $this->baggageWeight;
    }

    public function resetWeightOfBaggageToZero() {
        $this->baggageWeight = 0;
    }
}