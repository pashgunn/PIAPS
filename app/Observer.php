<?php

namespace App;

interface Observer
{
    public function update(Subject $subject);
}