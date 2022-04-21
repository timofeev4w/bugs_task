# bugs_task

Жуки не любят находиться рядом друг с другом и каждый прячется под отдельным камнем и старается выбирать камни, максимально удаленные от соседей. Так же жуки любят находится максимально далеко от края. Как только жук сел за камень, он более не перемещается. Всего в линии лежат X камней. И туда последовательно бежит прятаться Y жуков. Найти сколько свободных камней будет слева и справа от последнего жука.

X может быть до 4 млрд.

Примеры

X=8, Y=1 – ответ 3,4

X=8, Y=2 – ответ 1,2

X=8, Y=3 – ответ 1,1

_________________________________________________________________

В task2prog_solution.php - решение второй задачи непосредственно с помощью программирования, но оно упирается в проблему с исчислением больших чисел.

В task2logic_solution.php - также решение второй задачи, но с помощью логики, что значительно ускоряет процесс и можно работать с числами по 4 млрд.

В test_task2.php - тест для сравнения первого и второго способов решения второй задачи. Ищет расхождения в решениях.