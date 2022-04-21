<?php 

// Логическое решение задачи, можно подставлять 4 млрд

$start = microtime(true);

$rocks_count = 8;
$bugs_count = 3;

if ($bugs_count > $rocks_count) {
    print_r('Всем жукам не спрятаться!'.PHP_EOL);
    exit;
}

if ($rocks_count <= 0 || $bugs_count <= 0) {
    print_r('Зачем ломать программу? :('.PHP_EOL);
    exit;
}

$max_value = 2;

// Ищем ближайший член ряда
if($max_value <= $bugs_count) {
    while ($max_value <= $bugs_count) {
        $max_value = $max_value * 2;
    }
}else {
    // условие при 1 жуке
    $result = ($rocks_count - 1) / 2;
    $left_rocks = floor($result);
    $right_rocks = ceil($result);
    echo 'Слева: '.$left_rocks.', Справа: '.$right_rocks.PHP_EOL;
    exit;
}

// Получаем результат
$result = ($rocks_count - $bugs_count) / $max_value;

// Проверка при округлениях и присвоение результата
if ($result == round($result)) {
    $left_rocks = $result;
    $right_rocks = $result;
}elseif($result < round($result)) {    // >= 0.5
    $left_rocks = floor($result);
    $right_rocks = ceil($result);
}elseif($result > round($result)) {    // < 0.5
    $left_rocks = floor($result);
    $right_rocks = floor($result);
}

// Исключение, когда результат < 0
if ($result < 0) {
    $left_rocks = 0;
    $right_rocks = 0;
}

echo 'Слева: '.$left_rocks.', Справа: '.$right_rocks.PHP_EOL;

echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'.PHP_EOL;


?>