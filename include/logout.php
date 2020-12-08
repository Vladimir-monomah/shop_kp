<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
      session_start();
      unset($_SESSION['auth']);
      unset($_SESSION['id']);
      setcookie('rememberme','',0,'/');
      setcookie('user_uid','',0,'/');
      echo 'logout'; 
} 

?>