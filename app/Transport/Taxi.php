<?php

namespace App\Transport;

class Taxi
{
    private int $capacity = 4;
    private int $currentPassengerCount = 0;

    public function board(array $drivers, array $passengers): void
    {
        $tripCount = 0;

        for ($i = 0; $i < count($passengers); $i++) {
            if ($this->currentPassengerCount == 0) {
                echo "Trip #" . $tripCount+1 . PHP_EOL;
                // сажаем водителя
                if ($drivers[$tripCount]->getType() === 'Taxi driver') {
                    if($drivers[$tripCount]->getCategory() == 'B') {
                        echo "Driver [$drivers[$tripCount]] sat in taxi." . PHP_EOL;
                    } else {
                        echo "Category != 'B'" . PHP_EOL;
                    }
                } else {
                    echo "Type != 'Taxi'" . PHP_EOL;
                }
            }
            if ($this->currentPassengerCount < $this->capacity) {
                // сажаем пассажира
                if ($passengers[$i]->getType() === 'Taxi passenger') {
                    if ($passengers[$i]->getCategory() === 'Adult') {
                        echo "Passenger [$passengers[$i]] sat into taxi. ";
                    } elseif ($passengers[$i]->getCategory() === 'Child') {
                        echo "Passenger [$passengers[$i]] is seated in a child seat. ";
                    }
                    echo "Seats left in taxi: " . $this->capacity - $this->currentPassengerCount . PHP_EOL;
                    $this->currentPassengerCount++;
                } else {
                    echo "Type != 'Taxi'" . PHP_EOL;
                }
            }
            if ($this->currentPassengerCount == $this->capacity) {
                echo "The taxi is full of passengers" . PHP_EOL . PHP_EOL;
                $tripCount++;
                $this->currentPassengerCount = 0;
            }
        }
    }
}