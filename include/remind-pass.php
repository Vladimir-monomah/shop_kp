<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('it', true);    
include("db_connect.php");
include("../function/function.php");

$email = clear_string($_POST["email"]);

if ($email != "")
{
    
   $result = mysql_query("SELECT email FROM reg_user WHERE email='$email'",$link);
If (mysql_num_rows($result) > 0)
{
    
// Генерация пароля.
    $newpass = fungenpass();
    
// Шифрование пароля.
    $pass   = md5($newpass);
    $pass   = strrev($pass);
    $pass   = strtolower("9nm2rv8q".$pass."2yo6z");    
 
// Обновление пароля на новый.
$update = mysql_query ("UPDATE reg_user SET pass='$pass' WHERE email='$email'",$link);

    
// Отправка нового пароля.
   
	         send_mail( 'vladimir-bykov-1999@mail.ru',
			             $email,
						'Новый пароль для сайта "BrightFuture"',
						'Ваш пароль: '.$newpass);   
   
   echo 'yes';
    
}else
{
    echo 'Данный E-mail не найден!';
}

}
else
{
    echo 'Укажите свой E-mail';
}

}



?>