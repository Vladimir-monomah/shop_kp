<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('it', true);
    include("../include/db_connect.php");
    include("../function/function.php");

    $login = clear_string($_POST['reg_login'],$link);

    $result = mysqli_query($link, "SELECT login FROM reg_user WHERE login = '$login'");
    if (mysqli_num_rows($result) > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
}
?>
