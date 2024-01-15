<?php
defined('it') or die('Доступ запрещён!');
$db_host     = "localhost";
$db_user     = "root";
$db_pass     = "";
$db_database = "goldenbrush";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if (!$link) {
    die("Нет соединения с БД " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");
header("Content-Type: text/html; charset=utf-8");
?>