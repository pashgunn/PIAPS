<?php

namespace App;

class Deanery implements Observer
{
    private string $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update(Subject $subject)
    {
        $data = $subject->getCurrentData();
        if (empty($data)) {
            echo "Уведомление для кафедры {$this->name}: Данные отсутствуют.\n";
        } else {
            echo "Уведомление для кафедры {$this->name}: Данные успешно обновлены.\n";
        }
    }
}