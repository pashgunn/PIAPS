<?php

use App\AcademicPerformanceData;
use App\Deanery;
use App\Teacher;

require_once __DIR__ . '/vendor/autoload.php';


$subject = new AcademicPerformanceData();

$observer1 = new Deanery("Кафедра математики");
$observer2 = new Deanery("Кафедра физики");

$subject->attach($observer1);
$subject->attach($observer2);

// Преподаватель создает текущую успеваемость и размещает её в БД
$data1 = [
    'ПИН-31' => array('Богачев' => 4, 'Бабич' => 5),
];

$data2 = [
    'ПИН-32' => array('Морозов' => 3, 'Колесов' => 4)
];

$teachers = [];

$teachers[] = new Teacher();
$teachers[0]->createCurrentPerformance($data1);

$teachers[] =  new Teacher();
$teachers[1]->createCurrentPerformance($data2);

$counter = 0;
// Когда преподаватель обновляет данные в БД, вызывается метод "setCurrentData()", который уведомит всех подписчиков (кафедру деканата) о новых данных.
foreach ($teachers as $teacher) {
    echo "Учитель #";
    echo $counter++;
    echo " заполняет успеваемость" . PHP_EOL;
    $subject->setCurrentData($teacher->getCurrentData());
    echo "Текущее кол-во учителей: $counter" . PHP_EOL;
}

unset($teachers[0]);
echo "Текущее кол-во учителей: ";
echo count($teachers);