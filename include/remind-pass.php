<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('it', true);
    include("db_connect.php");
    include("../function/function.php");

    $email = clear_string($_POST["email"],$link);

    if ($email != "") {
        $result = mysqli_query($link, "SELECT email FROM reg_user WHERE email='$email'");
        if (mysqli_num_rows($result) > 0) {
            // Генерация пароля.
            $newpass = fungenpass();

            // Шифрование пароля.
            $pass = md5($newpass);
            $pass = strrev($pass);
            $pass = strtolower("9nm2rv8q" . $pass . "2yo6z");

            // Обновление пароля на новый.
            $update = mysqli_query($link, "UPDATE reg_user SET pass='$pass' WHERE email='$email'");

            // Отправка нового пароля.
            send_mail('vladimir-bykov-1999@mail.ru', $email, 'Новый пароль для сайта "BrightFuture"', 'Ваш пароль: ' . $newpass);

            echo 'yes';
        } else {
            echo 'Данный E-mail не найден!';
        }
    } else {
        echo 'Укажите свой E-mail';
    }
}
?>
