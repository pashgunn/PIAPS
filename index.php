<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Boards\BoardBus;
use App\Boards\BoardTaxi;
use App\Passengers\BusPassenger;
use App\Passengers\TaxiPassenger;

$taxiPassengers = [];
$taxi = new TaxiPassenger();
for ($i = 0; $i < 60; $i++) {
    $taxiPassengers[] = new TaxiPassenger();
}

$busPassengers = [];

for ($i = 0; $i < 60; $i++) {
    $busPassengers[] = new BusPassenger();
}

for ($i = 0; $i < count($taxiPassengers) / BoardTaxi::$capacity; $i++) {
    $taxi = new BoardTaxi();
    $taxi->boardTaxi($taxiPassengers);
}

for ($i = 0; $i < count($busPassengers) / BoardBus::$capacity; $i++) {
    $bus = new BoardBus();
    $bus->boardBus($taxiPassengers);
}
