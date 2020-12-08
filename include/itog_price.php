<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('it', true);
include('db_connect.php');
include('../function/function.php');
include("./auth_cookie.php");

$user_uid = isset($_SESSION['id']) ? $_SESSION['id'] : $_SERVER['REMOTE_ADDR'];
$result = mysql_query("SELECT * FROM cart WHERE cart_ip = '$user_uid'",$link);
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  
do
{
    $int = $int + ($row["cart_price"] * $row["cart_count"]); 

} while($row = mysql_fetch_array($result));


     echo group_numerals($int);

}
}
?>