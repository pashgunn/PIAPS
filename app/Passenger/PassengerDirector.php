<?php

namespace App\Passenger;

class PassengerDirector {
    private PassengerBuilder $builder;

    public function __construct(PassengerBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildTaxiAdultPassenger(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Taxi passenger')
            ->setCategory('Adult')
            ->setChildSeat('no');
    }

    public function buildTaxiChildPassenger(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Taxi passenger')
            ->setCategory('Child')
            ->setChildSeat('yes');
    }

    public function buildBusAdultPassenger(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Bus passenger')
            ->setCategory('Adult')
            ->setCostOfTravel(2);
    }

    public function buildBusChildPassenger(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Bus passenger')
            ->setCategory('Child')
            ->setCostOfTravel(1);
    }

    public function buildBusDiscountedPassenger(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Bus passenger')
            ->setCategory('Discounted')
            ->setCostOfTravel(0);
    }
}