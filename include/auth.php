<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    define('it', true);
    include('db_connect.php');
    include('../function/function.php');
    
    $login = clear_string($_POST["login"],$link);
    
    $pass   = encode_pass(clear_string($_POST["pass"],$link));    

    
    if ($_POST["rememberme"] == "yes")
    {
        setcookie('rememberme', $login.'+'.$pass, time()+3600*24*31, "/");
    }
    
    $result = mysqli_query($link, "SELECT * FROM reg_user WHERE (login = '$login' OR email = '$login') AND pass = '$pass'");
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
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
        mysqli_query($link, "UPDATE cart SET cart_ip = '".$_SESSION['id']."' WHERE cart_ip = '$user_uid'");
        
        setcookie('user_uid', '', 0, '/');
    }
    else
    {
        echo 'no_auth';
    }  
} 
?>
