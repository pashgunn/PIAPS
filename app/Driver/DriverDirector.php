<?php

namespace App\Driver;

class DriverDirector {
    private DriverBuilder $builder;

    public function __construct(DriverBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildTaxiDriver(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Taxi driver')
            ->setDriverCategory('B');
    }

    public function buildBusDriver(): void
    {
        $this->builder->reset();
        $this->builder
            ->setType('Bus driver')
            ->setDriverCategory('D');
    }
}