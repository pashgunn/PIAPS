<?php

namespace App\Adapters;

use mysqli;
use mysqli_result;

class MysqlAdapter implements DatabaseAdapter
{
    private mysqli $connection;

    public function connect(string $host, string $username, string $password, string $database)
    {
        $this->connection = mysqli_connect($host, $username, $password, $database);
    }

    public function query(string $query): mysqli_result|bool
    {
        return mysqli_query($this->connection, $query);
    }

    public function close()
    {
        mysqli_close($this->connection);
    }

}