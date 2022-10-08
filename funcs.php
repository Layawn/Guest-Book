<?php

require_once 'connect.php';

function clear_save_message()
{
    global $db;
    foreach ($_POST as $key => $value) {
        $_POST['key'] = mysqli_real_escape_string($db, $value);
    }
}

function save_messages()
{
    global $db;
    clear_save_message();
    extract($_POST);
    $name = htmlspecialchars($name);
    $text = htmlspecialchars($text);
    $query = "INSERT INTO gb (name, text) VALUES ('$name', '$text')";
    mysqli_query($db, $query);
}

function get_messages()
{
    $start = ($_GET['start']) ? $_GET['start'] : 0;
    global $db;
    $result = $db->query("SELECT * FROM gb WHERE id > " . $start, MYSQLI_STORE_RESULT);
    return $rows = $result->fetch_all(MYSQLI_ASSOC);
}

function print_arr($arr)
{
    echo "<pre>" . print_r($arr, true) . "</pre>";
}

if (!isset($_GET['action']))
{
    header('Content-Type: Application/json; charset=utf-8');
    echo json_encode(get_messages());
}

if (!empty($_POST))
{
    save_messages();
}