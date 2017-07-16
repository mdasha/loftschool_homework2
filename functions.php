<?php
/**
 * Created by PhpStorm.
 * User: Dasha
 * Date: 11.07.2017
 * Time: 23:35
 */

//Задание #1
function task1($string_array, $one_row = false)
{
    /** @var Количество элементов массива со строками $string_array_length */
    $string_array_length = count($string_array);
    $string = "";
    for ($i = 0; $i < $string_array_length; $i++) {
        if ($one_row === true) {
            $string = $string . $string_array[$i] . " ";
        } else {
            $string = $string . '<p>' . $string_array[$i] . '</p>';
        }
    }
    return $string;
}
//Задание #2
function task2($numberArray, $math)
{
    $numberArrayLength = count($numberArray);
    // Проверяем, введен ли массив чисел. Если элемент - число, то к переменной $numeric прибавляем 1.
    $numeric = 0;
    for ($i=0; $i < $numberArrayLength; $i++) {
        if (is_numeric($numberArray[$i]) and !is_string($numberArray[$i])) {
            $numeric = $numeric + 1;
        }
    }
    // Проверяем, все ли элементы массива числа. Если $numeric меньше кол-ва элементов массива, то числа - не все.
    // Тогда выводим ошибку. Если все числа, то проверяем второй параметр и проводим вычисления.
    if ($numeric === $numberArrayLength) {
        for ($i = 1; $i < $numberArrayLength; $i++) {
            $result[0] = $numberArray[0];
            $PrintCalculation[0] = $numberArray[0];
            // Отображаем введенные числа и математические операциии
            $PrintCalculation[$i] = $PrintCalculation[$i - 1].' '.$math.' '.$numberArray[$i];
            //Производим вычисления, если введена одна из мат.операций или выводим сообщение об ошибке
            switch ($math) {
                case '+':
                    $result[$i] = $result[$i - 1] + $numberArray[$i];
                    break;
                case '-':
                    $result[$i] = $result[$i - 1] - $numberArray[$i];
                    break;
                case '*':
                    $result[$i] = $result[$i - 1] * $numberArray[$i];
                    break;
                case '/':
                    $result[$i] = $result[$i - 1] / $numberArray[$i];
                    break;
                default:
                    $err = 1;
                    $result[$i] = '<strong>Ошибка!!!</strong> Введите в качестве параметра функции 
                арифметическую операцию "+", "-", "*" или "/"';
                    break;
            }
        }
        if ($err!=1) {
            $result = $PrintCalculation[$numberArrayLength - 1].'='.$result[$numberArrayLength - 1];
        } else {
            $result = $result[$numberArrayLength - 1];
        }
    } else {
        $result = '<strong>Ошибка!!!</strong> Одно или несколько элементов массива 
        не являются числами. Введите числовые данные';
    }
    return $result;
}
//Задание #3
//Функция с переменным количеством аргументов
function task3()
{
    $countParam = func_num_args();
    $numeric = 0;
    //Проверяем, являются ли аргументы целыми или вещественными числами (кроме первого)
    for ($i = 1; $i < $countParam; $i++) {
        if (is_double(func_get_arg($i)) or is_int(func_get_arg($i))) {
            $numeric = $numeric + 1;
        }
    }
    // Проверяем, все ли элементы массива, кроме первого, числа. Если $numeric меньше кол-ва элементов массива - 1,
    // то числа - не все.
    // Тогда выводим ошибку. Если все числа, то проверяем первый элемент массива и проводим вычисления.
    if ($numeric === $countParam - 1) {
        for ($i = 2; $i < $countParam; $i++) {
            $result[1] = func_get_arg(1);
            $PrintCalculation[1] = func_get_arg(1);
            // Отображаем введенные числа и математические операциии
            $PrintCalculation[$i] = $PrintCalculation[$i - 1] . ' ' . func_get_arg(0) . ' ' . func_get_arg($i);
            //Производим вычисления, если введена одна из мат.операций или выводим сообщение об ошибке
            switch (func_get_arg(0)) {
                case '+':
                    $result[$i] = $result[$i - 1] + func_get_arg($i);
                    break;
                case '-':
                    $result[$i] = $result[$i - 1] - func_get_arg($i);
                    break;
                case '*':
                    $result[$i] = $result[$i - 1] * func_get_arg($i);
                    break;
                case '/':
                    $result[$i] = $result[$i - 1] / func_get_arg($i);
                    break;
                default:
                    $err = 1;
                    $result[$i] = '<strong>Ошибка!!!</strong> Введите в качестве параметра функции 
                арифметическую операцию "+", "-", "*" или "/"';
                    break;
            }
        }
        if ($err!=1) {
            $result = $PrintCalculation[$countParam  - 1].'='.$result[$countParam  - 1];
        } else {
            $result = $result[$countParam  - 1];
        }
    } else {
        $result = '<strong>Ошибка!!!</strong> Одно или несколько элементов массива 
        не являются целыми и/или вещественными числами. Введите числовые данные';
    }
    return $result;
}
//Задание #4
//Таблица умножения
function task4($tab1, $tab2) {
    //Проверяем, введены ли целые числа в качестве аргументов
    $err = '';
    if (!is_int($tab1)) {
        $err = $err.'Первый аргумент - не целое число. Введите целое число<br>';
    }
    if (!is_int($tab2)) {
        $err = $err.'Второй аргумент - не целое число. Введите целое число';
    }
    //Если один из аргументов - не целое число, выводим сообщение об ошибке.
    //Если оба аргумента целые числа, то выводим таблицу умножения
    if ($err==='') {
        echo 'Таблица умножения с '.$tab1.'x'.$tab1.' до '.$tab2.'x'.$tab2.'<br><br>';
        echo '<table border=\"1\">';
        for ($i = $tab1; $i <= $tab2; $i++) {
            echo '<tr>';
            for ($j = $tab1; $j <= $tab2; $j++) {
                echo '<td>'.$i*$j.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo $err;
    }
}
//Задание #5
//Проверяем, введен ли палиндром. Если да - выдаем true, если нет - выдаем false
function task5_1($palindrome)
{
    //Удаляем пробелы во введенной строке
    $pieces = explode(" ", $palindrome);
    $noBlanksPalyndrome = implode("", $pieces);

    //Переводим полученную строку без пробелов в нижний регистр
    $lowerCasePalyndrome = mb_strtolower($noBlanksPalyndrome);

    //Считаем длину полученной строки
    $palyndromeLength = mb_strlen($lowerCasePalyndrome);

    //Считаем половину длины полученной строки, округляем вниз (чтобы не учитывать возможный символ в середине слова)
    $halfPalyndromeLength = round($palyndromeLength / 2, 0, PHP_ROUND_HALF_DOWN);

    //Проверяем введенные данные. Если не строка, то выдаем ошибку
    if (!is_string($palindrome)) {
        echo 'Введите строку в качестве аргумента для проверки на палиндром';
    } else {
        //Сравниваем значения элементов приведенной строковой переменной: 1-ый символ с последним,
        // 2-ой - с предпоследним и т.д. до половины длины строки. Если символы не совпадают,
        // присваиваем false переменной $result, выходим из цикла. Если совпдают, то $result присваиваем true
        // и продолжаем перебирать символы.
        $result = 0;
        for ($i = 0; $i < $halfPalyndromeLength; $i++) {
            $j = 2*$i;
            $leftSymbol[$i] = substr($lowerCasePalyndrome, $j, 2);
            $rightSymbol[$i] = mb_substr($lowerCasePalyndrome, ($palyndromeLength - 1 - $i), 1);
            if ($leftSymbol[$i]===$rightSymbol[$i]) {
                $result =  $result + 1;
            }
        }
        if ($result==$halfPalyndromeLength) {
            $ifPalyndrome = 'true';
        } else {
            $ifPalyndrome = 'false';
        }
        return  $ifPalyndrome;
    }
}
function task5_2($palindrome)
{
    if (task5_1($palindrome)==='true') {
        $result = '<br>Введенная строка является палиндромом';
    } elseif (task5_1($palindrome)==='false') {
        $result = '<br>Введенная строка не является палиндромом';
}
    return $result;
}

//Задание #6
//Вывод информации о текущей дате
function task6()
{
    //Текущая дата и время
    $today = date('d\.m\.Y\ H\:i');

    $unix = mktime(0, 0, 0, 2, 24, 2016);

    //Проверка правильности перевода в Unix-формат (обратное преобразование)
    $UnixDateTransform = date('d\.m\.Y\ H\:i\:s', $unix);

    //Выводим запрошенные данные
    $dates = 'Текущая дата и время: '.$today.'<br>
        unixtime время соответствующее 24.02.2016 00:00:00 - '.$unix. '
        <br>проверка - обратное преобразование: '.$UnixDateTransform;

    return $dates;
}
//Задание #7
//Замена и удаление букв
function task7() {
    $stringKarl = 'Карл у Клары украл Кораллы';
    echo '<ol><li>'.$stringKarl."<br>Удаляем заглавную букву К из фразы, получается:<br><strong>";
    //Длина строки $stringKarl
    $stringKarlLength = mb_strlen($stringKarl);
    //Перебираем все буквы во фразе. Если не "К", то выводим на экран
    for ($i = 0; $i < $stringKarlLength; $i++) {
        $letter[$i] = mb_substr($stringKarl, $i, 1);
        if ($letter[$i] !== "К") {
            echo $letter[$i];
        }
        $letter[$i] = $letter[$i].$stringKarlLength[$i + 1];
    }
    echo '</strong></li>';
    $stringLimonade = 'Две бутылки лимонада';
    //Заменяем в строке слово "Две" на слово "Три"
    $two = 'Две';
    $three = 'Три';
    $replacement = str_replace($two, $three, $stringLimonade);
    echo '<li>Исходная строка:'.$stringLimonade.'<br>Заменяется на:<strong> '.$replacement.'</strong>';
    echo '</li></ol>';
}

//Задание #8
//Регулярные выражения



//Задание #9
//Вывод содержимого файла на экран
function task9 ($file)
{
    $openedFile = fopen($file, r);
    $fileContent = fread($openedFile, 100);
    return $fileContent;
}

//Задание #10
//Создание файла средствами PHP и запись в него информации
function task10($file)
{
    touch($file);
    $openedFile = fopen($file, w);
    fwrite($openedFile, 'Hello again!');

    $openedFile2 = fopen($file, r);
    $fileContent = 'Создан файл: '.$file.'<br>С содержимым: '.fread($openedFile2, 100);
    return $fileContent;
}
