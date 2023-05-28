<?php

namespace App\Observers;

class LoggingObserver implements UserObserver
{
    public function onUpdate(User $user) {
        echo "User with name {$user->getName()} has been updated.\n";
    }

    public function onDelete(User $user) {
        echo "User with name {$user->getName()} has been deleted.\n";
    }

    public function onCreate(User $user) {
        echo "User with name {$user->getName()} has been created.\n";
    }
}