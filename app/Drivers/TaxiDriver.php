<?php

namespace App\Drivers;

class TaxiDriver extends Driver
{
    public function __construct()
    {
        $this->category = 'B';
    }
}