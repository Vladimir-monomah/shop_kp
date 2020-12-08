<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
define('it', true);    
include("../include/db_connect.php");
include("../function/function.php");

$login = clear_string($_POST['reg_login']);

$result = mysql_query("SELECT login FROM reg_user WHERE login = '$login'",$link);
If (mysql_num_rows($result) > 0)
{
   echo 'false';
}
else
{
   echo 'true'; 
}
}
?>