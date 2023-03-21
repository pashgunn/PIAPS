<?php

namespace App\Driver;

class Driver {
    private string $type;
    private string $driver_category;

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function setDriverCategory($driver_category): void
    {
        $this->driver_category = $driver_category;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCategory(): string
    {
        return $this->driver_category;
    }

    public function __toString()
    {
        return "Type: $this->type, Driver category: $this->driver_category";
    }
}