<?php

namespace App;

class Teacher
{
    private array $currentData;

    public function createCurrentPerformance(array $currentData): void
    {
        $this->currentData = $currentData;
    }

    public function getCurrentData(): array
    {
        return $this->currentData;
    }
}