<?php

namespace App\Observers;

use InvalidArgumentException;

class User
{
    public array $observers = [];

    public function __construct (
        private readonly string $name,
        private string       $email,
        private string $password
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    // Observer pattern: add and remove observers
    public function addObserver(UserObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(UserObserver $observer): void
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    // Observer pattern: notify observers
    public function notifyObserversOnUpdate(): void
    {
        foreach ($this->observers as $observer) {
            $observer->onUpdate($this);
        }
    }

    public function notifyObserversOnCreate(): void
    {
        foreach ($this->observers as $observer) {
            $observer->onCreate($this);
        }
    }

    public function notifyObserversOnDelete(): void
    {
        foreach ($this->observers as $observer) {
            $observer->onDelete($this);
        }
    }
}