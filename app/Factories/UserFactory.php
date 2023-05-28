<?php

namespace App\Factories;

use App\Observers\User;

interface UserFactory
{
    public function createUser(string $name, string $email, string $password): User;
    public function updateUserName(string $name, int $id);
    public function deleteUserById(int $id);
}