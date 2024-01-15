<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('it', true);
    include('db_connect.php');
    include('../function/function.php');
    include("./auth_cookie.php");

    $user_uid = isset($_SESSION['id']) ? $_SESSION['id'] : $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($link, "SELECT * FROM cart WHERE cart_ip = '$user_uid'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $int = 0;

        do {
            $int = $int + ($row["cart_price"] * $row["cart_count"]);
        } while ($row = mysqli_fetch_array($result));

        echo group_numerals($int);
    }
}
?>
