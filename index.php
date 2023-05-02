<?php

use App\Context\Context;
use App\Expression\BracketSpaceRemover;
use App\Expression\DashReducer;
use App\Expression\DoubleSpaceReducer;
use App\Expression\NewlineReducer;
use App\Expression\QuoteReplacer;
use App\Expression\TabReplacer;

require_once __DIR__ . '/vendor/autoload.php';

$text = 'Это - пример текста, с множественными пробелами   и дефисами.
"Кавычки" должны быть заменены на «кавычки», а табуляторы на пробелы.
( Лишние пробелы перед и после скобок, запятых и точек).
Множественные переводы строк

должны быть уменьшены.';

$context = new Context();
$context->setText($text);
echo $context->getText() . PHP_EOL . PHP_EOL;

$expressions = [];
$expressions[] = new QuoteReplacer();
$expressions[] = new DashReducer();
$expressions[] = new TabReplacer();
$expressions[] = new NewlineReducer();
$expressions[] = new DoubleSpaceReducer();
$expressions[] = new BracketSpaceRemover();


foreach ($expressions as $expression) {
    $context->setText($expression->interpret($context));
}
echo $context->getText();