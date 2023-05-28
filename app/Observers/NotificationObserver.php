<?php

namespace App\Observers;

class NotificationObserver implements UserObserver
{
    public function onUpdate(User $user)
    {
        echo "Sending notification about user with name {$user->getName()} being updated.\n";
    }

    public function onDelete(User $user)
    {
        echo "Sending notification about user with name {$user->getName()} being deleted.\n";
    }

    public function onCreate(User $user)
    {
        echo "Sending notification about user with name {$user->getName()} being created.\n";
    }
}