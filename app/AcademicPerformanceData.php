<?php

namespace App;

// subject
// содержит список объектов класса "Observer", которые хотят получать уведомления о новых записях в базе данных.
class AcademicPerformanceData implements Subject
{
    private array $observers;
    private array $currentData;

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }

    public function setCurrentData(array $data): void
    {
        $this->currentData = $data;
        $this->notify();
    }

    public function getCurrentData(): array
    {
        return $this->currentData;
    }
}