<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('it', true);
include("db_connect.php");
include("../function/function.php");
        
$id = clear_string($_POST["id"]);
    session_start();
$user_uid = isset($_SESSION['id']) ? $_SESSION['id'] : $_SERVER['REMOTE_ADDR'];
$result = mysql_query("SELECT * FROM cart WHERE cart_ip = '{$user_uid}' AND cart_id_products = '$id'",$link);
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);    
$new_count = $row["cart_count"] + 1;
$update = mysql_query ("UPDATE cart SET cart_count='$new_count' WHERE cart_ip = '{$user_uid}' AND cart_id_products ='$id'",$link);   
}
else
{
    $result = mysql_query("SELECT * FROM table_products WHERE products_id = '$id'",$link);
    $row = mysql_fetch_array($result);
    
    		mysql_query("INSERT INTO cart(cart_id_products,cart_price,cart_datetime,cart_ip)
						VALUES(	
                            '".$row['products_id']."',
                            '".$row['price']."',					
							NOW(),
                            '".$user_uid."'                                                                        
						    )",$link);	
}
}
?>