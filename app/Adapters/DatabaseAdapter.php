<?php

namespace App\Adapters;

interface DatabaseAdapter
{
    public function connect(string $host, string  $username, string  $password, string  $database);
    public function query(string $query);
    public function close();
}