<?php

namespace App\Transport;

class Bus
{
    private int $capacity = 30;
    private int $currentPassengerCount = 0;

    public function board(array $drivers, array $passengers): void
    {
        $tripCount = 0;

        for ($i = 0; $i < count($passengers); $i++) {
            if ($this->currentPassengerCount == 0) {
                echo "Trip #" . $tripCount+1 . PHP_EOL;
                // сажаем водителя
                if ($drivers[$tripCount]->getType() === 'Bus driver') {
                    if($drivers[$tripCount]->getCategory() == 'D') {
                        echo "Driver [$drivers[$tripCount]] sat in bus." . PHP_EOL;
                    } else {
                        echo "Category != 'D'" . PHP_EOL;
                    }
                } else {
                    echo "Type != 'Taxi'" . PHP_EOL;
                }
            }
            if ($this->currentPassengerCount < $this->capacity) {
                // сажаем пассажира
                if ($passengers[$i]->getType() === 'Bus passenger') {
                    echo "Passenger [$passengers[$i]] sat into taxi. Seats left in taxi: " . $this->capacity - $this->currentPassengerCount . PHP_EOL;
                    $this->currentPassengerCount++;
                } else {
                    echo "Type != 'Bus'" . PHP_EOL;
                }
            }
            if ($this->currentPassengerCount == $this->capacity) {
                echo "The bus is full of passengers" . PHP_EOL . PHP_EOL;
                $tripCount++;
                $this->currentPassengerCount = 0;
            }
        }
    }
}