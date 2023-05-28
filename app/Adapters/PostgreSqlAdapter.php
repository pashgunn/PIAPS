<?php

namespace App\Adapters;

use PDO;
use PDOStatement;

class PostgreSqlAdapter implements DatabaseAdapter
{
    private PDO $connection;

    public function connect(string $host, string $username, string $password, string $database)
    {
        $dsn = "pgsql:host=$host;dbname=$database;user=$username;password=$password";
        $this->connection = new PDO($dsn);
    }


    public function query(string $query): bool|PDOStatement
    {
        return $this->connection->query($query);
    }

    public function close()
    {
        $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        unset($this->connection);
    }

}