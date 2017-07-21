<?php
/**
 * Created by PhpStorm.
 * User: Dasha
 * Date: 11.07.2017
 * Time: 23:35
 */
require_once "functions.php";
echo '<h1>Домашнее задание №2</h1>';

// Задание #1
echo '<h2>Задание #1</h2>';
echo task1(["Проверка проверки связи", "Введены две строки", "Введена еще одна строка"], false);

// Задание #2
echo '<h2>Задание #2</h2>';
echo 'Арифметические операции с введенными числами<br><br>';
echo task2([125 , 22 , 158], '+');

// Задание #3
echo '<h2>Задание #3</h2>';
echo 'Функция с переменным числом аргументов<br><br>';
echo task3('*', 17.258, 2, 15, 25, 46);

// Задание #4
echo '<h2>Задание #4</h2>';
echo task4(2, 7);

//Задание #5
echo '<h2>Задание #5</h2>';
echo 'Палиндром<br><br>';
echo task5_1('Кошок лолоЛ коШок');
echo task5_2('Кошок лолоЛ коШок');

//Задание #6
echo '<h2>Задание #6</h2>';
echo task6();

//Задание #7
echo '<h2>Задание #7</h2>';
echo task7();

//Задание #8
echo '<h2>Задание #8</h2>';
echo task8('RX :) packets:1989 errors:0 dropped:0 overruns:0 frame:0.');

//Задание #9
echo '<h2>Задание #9</h2>';
echo task9('test.txt');

//Задание #10
echo '<h2>Задание #10</h2>';
echo task10('anothertest.txt');
