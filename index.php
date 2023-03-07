<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Boards\BoardBus;
use App\Boards\BoardTaxi;
use App\Passengers\BusPassenger;
use App\Passengers\TaxiPassenger;

// Taxi

$countTaxiPassengers = 60;

$taxiPassengers = [];
for ($i = 0; $i < $countTaxiPassengers; $i++) {
    $taxiPassengers[] = new TaxiPassenger();
}

$taxi = new BoardTaxi();
$taxi->boardTaxi($taxiPassengers);

// Bus

$countBusPassengers = 60;

$busPassengers = [];
for ($i = 0; $i < 60; $i++) {
    $busPassengers[] = new BusPassenger();
}

$bus = new BoardBus();
$bus->boardBus($busPassengers);

