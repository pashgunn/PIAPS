<?php

namespace App\Passenger;

class PassengerBuilder {
    private Passenger $passenger;

    public function __construct()
    {
        $this->reset();
    }

    public function setType($type)
    {
        $this->passenger->setType($type);
        return $this;
    }

    public function setCategory($category)
    {
        $this->passenger->setCategory($category);
        return $this;
    }

    public function setChildSeat($child_seat)
    {
        $this->passenger->setChildSeat($child_seat);
        return $this;
    }

    public function setCostOfTravel($cost_of_travel)
    {
        $this->passenger->setCostOfTravel($cost_of_travel);
        return $this;
    }

    public function getPassenger()
    {
        return $this->passenger;
    }

    public function reset()
    {
        $this->passenger = new Passenger();
    }
}