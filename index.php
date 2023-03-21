<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Passenger\PassengerBuilder;
use App\Passenger\PassengerDirector;
use App\Driver\DriverBuilder;
use App\Driver\DriverDirector;
use App\Transport\Taxi;
use App\Transport\Bus;

// ТАКСИ

// Пассажиры

$count_taxi_passengers = 60;

$taxi_passengers = [];

$builder = new PassengerBuilder();
$director = new PassengerDirector($builder);

// генерируем 3 взрослых и 1 ребенка, и так $count_taxi_passengers/4 раз
for ($i = 0; $i < $count_taxi_passengers; $i++) {
    if (($i+1)%4 != 0) {
        $director->buildTaxiAdultPassenger();
    } else {
        $director->buildTaxiChildPassenger();
    }
    $taxi_passengers[] = $builder->getPassenger();
}

// Водители

$count_taxi_drivers = $count_taxi_passengers/4;

$taxi_drivers = [];

$builder = new DriverBuilder();
$director = new DriverDirector($builder);

for ($i = 0; $i < $count_taxi_drivers; $i++) {
    $director->buildTaxiDriver();
    $driver = $builder->getDriver();
    $taxi_drivers[] = $driver;
}

// Поездка

$taxi = new Taxi();
$taxi->board($taxi_drivers, $taxi_passengers);

// АВТОБУС

// Пассажиры

$count_bus_passengers = 60;

$bus_passengers = [];

$builder = new PassengerBuilder();
$director = new PassengerDirector($builder);

// генерируем 1 взрослого, 1 ребенка, 1 льготника, и так $count_taxi_passengers/3 раз
for ($i = 0; $i < $count_bus_passengers; $i+=3) {
    $director->buildBusAdultPassenger();
    $bus_passengers[] = $builder->getPassenger();

    $director->buildBusChildPassenger();
    $bus_passengers[] = $builder->getPassenger();

    $director->buildBusDiscountedPassenger();
    $bus_passengers[] = $builder->getPassenger();
}

// Водители

$count_bus_drivers = $count_bus_passengers/30;

$bus_drivers = [];

$builder = new DriverBuilder();
$director = new DriverDirector($builder);

for ($i = 0; $i < $count_bus_drivers; $i++) {
    $director->buildBusDriver();
    $bus_drivers[] = $builder->getDriver();
}

// Поездка

$bus = new Bus();
$bus->board($bus_drivers, $bus_passengers);