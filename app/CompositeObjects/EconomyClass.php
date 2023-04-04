<?php

namespace App\CompositeObjects;

use App\Component;
use Exception;

class EconomyClass extends Component {
    const MAX_PASSENGERS = 150;
    const FREE_BAGGAGE_WEIGHT = 20;
    const MAX_BAGGAGE_WEIGHT = 60;
    protected array $passengers = [];

    public function add(Component $component)
    {
        if (count($this->passengers) < self::MAX_PASSENGERS) {
            if ($component->getBaggageWeight() <= self::MAX_BAGGAGE_WEIGHT) {
                $this->passengers[] = $component;
                 echo "Passenger sat in economy class" . PHP_EOL;
            } else {
                throw new Exception("Max baggage weight is exceeded.");
            }
        } else {
            throw new Exception("Economy class is full.");
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
