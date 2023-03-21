<?php

namespace App\Passenger;

class Passenger {
    private string $type;
    private string $category;
    private string $child_seat;
    private float $cost_of_travel;

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function setChildSeat($child_seat): void
    {
        $this->child_seat = $child_seat;
    }

    public function setCostOfTravel($cost_of_travel): void
    {
        $this->cost_of_travel = $cost_of_travel;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function __toString()
    {
        $result = "Type: $this->type, Category: $this->category, ";
        if (isset($this->child_seat)) {
            $result .= "Need for a child seat: $this->child_seat";
        }
        if (isset($this->cost_of_travel)) {
            $result .= "Cost of travel: $this->cost_of_travel$";
        }
        return $result;
    }
}