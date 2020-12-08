<?php

header("Content-Type: text/html; charset=utf-8");
session_start();

$available_langs = array("", "ru", "en");

if(isset($_POST['lang']) && array_search($_POST['lang'], $available_langs) != false)
{
    $_SESSION['lang'] = $_POST['lang'];
}
?>