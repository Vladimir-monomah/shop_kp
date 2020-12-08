<?php

define('it', true);
include('./function/localization.php');
include('./include/db_connect.php');
session_start();

echo localize_text($_GET["text"], $_SESSION["lang"], $link);
?>