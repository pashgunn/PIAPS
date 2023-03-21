<?php

namespace App\Driver;

class DriverBuilder {
    private Driver $driver;

    public function __construct()
    {
        $this->reset();
    }

    public function setType($type)
    {
        $this->driver->setType($type);
        return $this;
    }

    public function setDriverCategory($driver_category)
    {
        $this->driver->setDriverCategory($driver_category);
        return $this;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function reset()
    {
        $this->driver = new Driver();
    }
}