<?php

namespace App\Drivers;

class Driver
{
    protected string $category;

    public function getCategory(): string
    {
        return $this->category;
    }
}