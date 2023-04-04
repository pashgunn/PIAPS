<?php

namespace App;

use App\CompositeObjects\BusinessClass;
use App\CompositeObjects\EconomyClass;
use App\CompositeObjects\FirstClass;
use App\PrimitiveObjects\Passenger;
use App\PrimitiveObjects\Pilot;
use App\PrimitiveObjects\Stewardess;
use Exception;

class Flight {

    const MAX_BAGGAGE_WEIGHT_OF_ALL_PASSENGERS = 6000;
    protected array $pilots;
    protected array $stewardesses;
    protected array $firstClassPassengers;
    protected array $businessClassPassengers;
    protected array $economyClassPassengers;
    protected float $totalBaggageWeight;

    public function __construct($countPassengersInFirstClass, $countPassengersInBusinessClass, $countPassengersInEconomyClass)
    {
        $this->pilots = [
            new Pilot('1st pilot'),
            new Pilot('2nd pilot')
        ];
        $this->stewardesses = [
            new Stewardess('1st stewardess'),
            new Stewardess('2nd stewardess'),
            new Stewardess('3rd stewardess'),
            new Stewardess('4th stewardess'),
            new Stewardess('5th stewardess'),
            new Stewardess('6th stewardess')
        ];
        for ($i = 0; $i < $countPassengersInFirstClass; $i++){
            $newPassenger = new Passenger('First class passenger', rand(5,60));
            $this->firstClassPassengers[] = $newPassenger;
        }
        for ($i = 0; $i < $countPassengersInBusinessClass; $i++){
            $newPassenger = new Passenger('Business class passenger', rand(5,60));
            $this->businessClassPassengers[] = $newPassenger;
        }
        for ($i = 0; $i < $countPassengersInEconomyClass; $i++){
            $newPassenger = new Passenger('Economy class passenger', rand(5,60));
            $this->economyClassPassengers[] = $newPassenger;
        }
        $this->totalBaggageWeight = 0;
    }

    public function checkCrew(){
        if (count($this->pilots) == 2 && count($this->stewardesses) == 6) {
            echo PHP_EOL . "[INFO] The crew is ready!" . PHP_EOL;
        } else {
            throw new Exception("Crew isn't complete.");
        }
    }
    public function addFirstClassPassengers(){
        echo PHP_EOL . "[INFO] Boarding passengers into first class:" . PHP_EOL;
        $firstClass = new FirstClass();
        foreach ($this->firstClassPassengers as $passenger) {
            $firstClass->add($passenger);
        }
        $this->totalBaggageWeight += $firstClass->getBaggageWeight();
        echo "[INFO] Boarding passengers into first class is completed!" . PHP_EOL;
        echo "[INFO] Current total baggage weight: $this->totalBaggageWeight kg" . PHP_EOL;
    }

    public function addBusinessClassPassengers(){
        echo PHP_EOL . "[INFO] Boarding passengers into business class:" . PHP_EOL;
        $businessClass = new BusinessClass();
        foreach ($this->businessClassPassengers as $passenger) {
            $businessClass->add($passenger);
        }
        $this->totalBaggageWeight += $businessClass->getBaggageWeight();
        echo "[INFO] Boarding passengers into business class is completed!" . PHP_EOL;
        echo "[INFO] Current total baggage weight: $this->totalBaggageWeight kg". PHP_EOL;
    }

    public function addEconomyClassPassengers(){
        echo PHP_EOL . "[INFO] Boarding passengers into economy class:" . PHP_EOL;
        $economyClass = new EconomyClass();
        foreach ($this->economyClassPassengers as $passenger) {
            if ($economyClass->getBaggageWeight() + $passenger->getBaggageWeight() > self::MAX_BAGGAGE_WEIGHT_OF_ALL_PASSENGERS) {
                echo "[INFO] WARNING: The total weight of baggage on the plane is exceeded! This passenger is flying without baggage." . PHP_EOL;
                $passenger->resetWeightOfBaggageToZero(); // удаляем багаж у пассажира
            }
            $economyClass->add($passenger);
        }
        $this->totalBaggageWeight += $economyClass->getBaggageWeight();
        echo "[INFO] Boarding passengers into economy class is completed!" . PHP_EOL;
        echo "[INFO] Current total baggage weight: $this->totalBaggageWeight kg". PHP_EOL;
    }
}