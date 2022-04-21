<?php 

// Решение задачи с точки зрения программирования, но PHP захлебнется при 4 млрд
// В теории можно использовать спец решения быстрых массивов или БД, но 4 млрд все равно много :)

set_time_limit(0);

$start = microtime(true);

$rocks_count = [8];
$bugs_count = 3;
$right_rocks = 0;
$left_rocks = 0;

if ($bugs_count > $rocks_count[0]) {
    print_r('Всем жукам не спрятаться!'.PHP_EOL);
    exit;
}

if ($rocks_count[0] <= 0 || $bugs_count <= 0) {
    print_r('Зачем ломать программу? :('.PHP_EOL);
    exit;
}

for ($i=0; $i < $bugs_count; $i++) { 
    // Ищем самый длинный пустой ряд камней и его номер
    $max_free_rocks = max($rocks_count);
    $num_free_rocks = array_keys($rocks_count, $max_free_rocks);
    // Вычисляем кол-во камней по краям и записываем обратно в массив, как пустые места
    $right_rocks = floor($rocks_count[$num_free_rocks[0]] / 2);
    $left_rocks = $rocks_count[$num_free_rocks[0]] - $right_rocks - 1;
    $rocks_count[$num_free_rocks[0]] = $left_rocks;
    $rocks_count[] = $right_rocks;
}

print_r('Слева: '.$left_rocks.', Справа: '.$right_rocks.PHP_EOL);
echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'.PHP_EOL;


?>