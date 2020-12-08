<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    define('it', true);
	include('db_connect.php');
    include('../function/function.php');
    
    $login = clear_string($_POST["login"]);
    
    $pass   = encode_pass(clear_string($_POST["pass"]));    

    
    if ($_POST["rememberme"] == "yes")
    {

            setcookie('rememberme',$login.'+'.$pass,time()+3600*24*31, "/");

    }
    
       
   $result = mysql_query("SELECT * FROM reg_user WHERE (login = '$login' OR email = '$login') AND pass = '$pass'",$link);
If (mysql_num_rows($result) > 0)
{
    $row = mysql_fetch_array($result);
    session_start();
    $user_uid = isset($_SESSION['id']) ? $_SESSION['id'] : $_SERVER['REMOTE_ADDR'];
    $_SESSION['id'] = $row["id"];
    $_SESSION['auth'] = 'yes_auth'; 
    $_SESSION['auth_pass'] = $row["pass"];
    $_SESSION['auth_login'] = $row["login"];
    $_SESSION['auth_surname'] = $row["surname"];
    $_SESSION['auth_name'] = $row["name"];
    $_SESSION['auth_patronymic'] = $row["patronymic"];
    $_SESSION['auth_address'] = $row["address"];
    $_SESSION['auth_phone'] = $row["phone"];
    $_SESSION['auth_email'] = $row["email"];
    echo 'yes_auth';
    
    // Переносим корзину заказов незаригистрированного пользователя в корзину залогиненного
    mysql_query("UPDATE cart SET cart_ip = '".$_SESSION['id']."' WHERE cart_ip = '$user_uid'", $link);

      setcookie('user_uid','',0,'/');
}else
{
    echo 'no_auth';
}  
} 

?>