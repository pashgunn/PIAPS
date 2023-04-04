<?php

namespace App;

abstract class Component
{
    // добавить новый компонент в составной объект
    abstract public function add(Component $component);

    // удалить компонент из составного объекта
    abstract public function remove(Component $component);

    abstract public function getBaggageWeight();
}