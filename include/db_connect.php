<?php
defined('it') or die('Доступ запрещён!');
$db_host		= 'localhost';
$db_user		= 'id12452063_admin';
$db_pass		= 'wer789kl';
$db_database	= 'id12452063_goldenbrush'; 

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("Нет соединения с БД ".mysql_error());
mysql_query("SET names utf8");
header("Content-Type: text/html; charset=utf-8");
?>