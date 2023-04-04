<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Flight;

$countPassengersInFirstClass = readline('Input count passengers in first class: ');
$countPassengersInBusinessClass = readline('Input count passengers in business class: ');
$countPassengersInEconomyClass = readline('Input count passengers in economy class: ');

$flight = new Flight($countPassengersInFirstClass, $countPassengersInBusinessClass, $countPassengersInEconomyClass);
$flight->checkCrew();
$flight->addFirstClassPassengers();
$flight->addBusinessClassPassengers();
$flight->addEconomyClassPassengers();
echo PHP_EOL . "[INFO] Boarding is finished. Fasten your seat belts, we're taking off!";