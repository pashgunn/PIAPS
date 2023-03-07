<?php

namespace App\Drivers;

class TaxiDriver extends Driver
{
    private static ?TaxiDriver $instance = null;

    public function __construct()
    {
        $this->category = 'B';
    }

    public static function getInstance(): TaxiDriver
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}