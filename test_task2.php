<?php 

// Тест поиска расхождений в разных способах решения задачи №2.

set_time_limit(0);

$rocks = 35560;
$bugs = 1545;
$prog_results = [];
$logic_results = [];

for ($i=2; $i <= $bugs; $i++) { 
    // Решение задачи с точки зрения программирования, но PHP захлебнется при 4 млрд
    // В теории можно использовать спец решения быстрых массивов или БД, но 4 млрд все равно много :)
    
    $rocks_count = [$rocks];
    $bugs_count = $i;
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
    
    $prog_results[] = [$left_rocks, $right_rocks];
}


for ($i=2; $i <= $bugs; $i++) { 
    $rocks_count = $rocks;
    $bugs_count = $i;
    
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
    

    $logic_results[] = [$left_rocks, $right_rocks];
}

$errors = 0;
for ($i=0; $i < count($prog_results); $i++) { 
    $check = array_diff($prog_results[$i], $logic_results[$i]);
    
    if (!empty($check)) {
        $errors += 1;
    }
}

if ($errors == 0) {
    echo('Все правильно!').PHP_EOL;
}else {
    echo('Есть ошибки!').PHP_EOL;
}


?>