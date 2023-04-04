<?php

namespace App\PrimitiveObjects;

use App\Component;
use Exception;

class Stewardess extends Component
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function add(Component $component)
    {
        throw new Exception("Can't add to a primitive object");
    }

    public function remove(Component $component)
    {
        throw new Exception("Can't delete from a primitive object");
    }

    public function getBaggageWeight()
    {
        return 0;
    }
}