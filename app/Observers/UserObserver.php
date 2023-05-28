<?php

namespace App\Observers;

interface UserObserver
{
    public function onUpdate(User $user);
    public function onDelete(User $user);
    public function onCreate(User $user);
}