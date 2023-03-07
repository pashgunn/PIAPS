<?php

namespace App\Drivers;

class BusDriver extends Driver
{
    private static ?BusDriver $instance = null;

    public function __construct()
    {
        $this->category = 'A';
    }

    public static function getInstance(): BusDriver
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}