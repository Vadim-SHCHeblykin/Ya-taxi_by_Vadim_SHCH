<?php
    // объявление текстовых переменных
    $text1 = "не определено"; 
    $text2 = "не определено";
    $str0 = "\nAJAX-Форма на домашнем сайте \"Яндекс.Такси\" (выполнил студент Вадим Щеблыкин) \n";
    $str = "\n\n(просьба открывать данный файл под названием forma.txt в приложении Notepad++, \nпоскольку в обычном блокноте все файлы открываются в кодировке ANSI, а файл forma.txt сохранён в кодировке utf-8)";
    $str1 = "\nФИО: ";
    $str2 = "\n\nТелефон: ";

    // проверка (с помощью функции isset()) поля fio на наличие в ней данных (если поле fio будет пустое, то в файл ничего не будет записано)
    if(isset($_POST["fio"])){ 
        $text1 = trim($_POST["fio"]); // функция trim() убирает по умолчанию все пробелы в начале и в конце полученной ею строки
    } // проверка поля telefon на наличие в ней данных (если поле telefon будет пустое, то в файл ничего не будет записано)
    if(isset($_POST["telefon"])){ 
        $text2 = trim($_POST["telefon"]);
    }
    
    $file = fopen("forma.txt", 'w+') or die("не удалось создать файл"); // создать файл forma.txt с возможностью записи текста (без редактирования при повторном запуске программы заново)

    // запись принятых от формы данных в файл в виде двух строк
    fwrite($file, $str0);
    fwrite($file, $str1.$text1); // $str1.$text1 -- это склеивание двух строк с помощью точки
    fwrite($file, $str2.$text2);
    fwrite($file, $str);

    fclose($file);

    $to      = "info@asmart-group.ru";
    $subject = $str0;
    $message = $str1.$text1.$str2.$text2;
    $headers = "От кого: vfizikov@yandex.ru";

    mail($to, $subject, $message, $headers);
?>
