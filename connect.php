<?php

$db = @new mysqli('localhost', 'root', '', 'gb');;

if ($db->connect_error) {
    exit('Ошибка соединения mysqli: ' . $db->connect_error);
}

$db->set_charset('utf8') or exit('Не установлена кодировка');