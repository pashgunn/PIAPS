<?php

namespace App\CompositeObjects;

use App\Component;
use Exception;

class FirstClass extends Component {
    const MAX_PASSENGERS = 10;
    const FREE_BAGGAGE_WEIGHT = INF;
    const MAX_BAGGAGE_WEIGHT = 60;
    protected array $passengers = [];

    public function add(Component $component)
    {
        if (count($this->passengers) < self::MAX_PASSENGERS) {
            if ($component->getBaggageWeight() <= self::MAX_BAGGAGE_WEIGHT) {
                $this->passengers[] = $component;
                echo "Passenger sat in first class" . PHP_EOL;
            } else {
                throw new Exception("Max weight of baggage exceeded");
            }
        } else {
            throw new Exception("First class is full");
        }
    }

    public function remove(Component $component)
    {
        $key = array_search($component, $this->passengers, true);
        if ($key !== false) {
            unset($this->passengers[$key]);
        }
    }

    public function getBaggageWeight()
    {
        $totalWeight = 0;
        foreach ($this->passengers as $passenger) {
            $totalWeight += $passenger->getBaggageWeight();
        }
        return $totalWeight;
    }
}
