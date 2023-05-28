<?php

namespace App\Factories;

use App\Adapters\DatabaseAdapter;
use App\Observers\User;

class MysqlUserFactory implements UserFactory
{
    public function __construct(private readonly DatabaseAdapter $dbAdapter)
    {}

    public function createUser(string $name, string $email, string $password): User
    {
        $query = "INSERT INTO users (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
        $this->dbAdapter->query($query);

        return new User($name, $email, $password);
    }

    public function updateUserName(string $name, int $id)
    {
        $query = "UPDATE users SET name='$name' WHERE id={$id}";
        return $this->dbAdapter->query($query);
    }

    public function deleteUserById(int $id)
    {
        $query = "DELETE FROM users WHERE id={$id}";
        return $this->dbAdapter->query($query);
    }

}