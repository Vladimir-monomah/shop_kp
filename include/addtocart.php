<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    define('it', true);
    include("db_connect.php");
    include("../function/function.php");
        
    $id = clear_string($_POST["id"],$link);
    session_start();
    $user_uid = isset($_SESSION['id']) ? $_SESSION['id'] : $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($link, "SELECT * FROM cart WHERE cart_ip = '{$user_uid}' AND cart_id_products = '$id'");
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);    
        $new_count = $row["cart_count"] + 1;
        $update = mysqli_query($link, "UPDATE cart SET cart_count='$new_count' WHERE cart_ip = '{$user_uid}' AND cart_id_products ='$id'");   
    }
    else
    {
        $result = mysqli_query($link, "SELECT * FROM table_products WHERE products_id = '$id'");
        $row = mysqli_fetch_array($result);
    
        mysqli_query($link, "INSERT INTO cart(cart_id_products, cart_price, cart_datetime, cart_ip)
                        VALUES(    
                            '".$row['products_id']."',
                            '".$row['price']."',                 
                            NOW(),
                            '".$user_uid."'                                                                        
                        )");    
    }
}
?>