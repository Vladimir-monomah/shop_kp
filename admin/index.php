<?php
	session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('it', true);
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";
  
  include("include/db_connect.php");
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<title>Администратор</title>
</head>
<body>
<!--Основной блок тела сайта -->
<div id="block-body">
<?php
	include("include/block-header.php"); 
     // Общее количество заказов 
 $query1 = mysqli_query($link,"SELECT * FROM orders");
 $result1 = mysqli_num_rows($query1);
 // Общее количество товаров 
 $query2 = mysqli_query($link,"SELECT * FROM table_products");
 $result2 = mysqli_num_rows($query2);   
 // Общее количество отзывов 
 $query3 = mysqli_query($link,"SELECT * FROM table_reviews");
 $result3 = mysqli_num_rows($query3);
  // Общее количество клиентов 
 $query4 = mysqli_query($link,"SELECT * FROM reg_user");
 $result4 = mysqli_num_rows($query4);
?>
<!--Основной блок тела сайта -->
<div id="block-content">
<!--Основной блок по статистике продаж интернет магазина -->
<div id="block-parameters">
<p id="title-page" >Статистика по продажам</p>
</div>

<ul id="general-statistics">
<li><p>Всего заказов - <span><?php echo $result1; ?></span></p></li>
<li><p>Товаров - <span><?php echo $result2; ?></span></p></li>
<li><p>Отзывы - <span><?php echo $result3; ?></span></p></li>
<li><p>Клиенты - <span><?php echo $result4; ?></span></p></li>
</ul>

<h3 id="title-statistics">Статистика продаж</h3>

<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>Дата</TH>
<TH>Товар</TH>
<TH>Цена</TH>
<TH>Статус</TH>
</TR>
<?php

$result = mysqli_query($link,"SELECT * FROM orders,buy_products WHERE orders.order_pay='accepted' AND orders.order_id=buy_products.buy_id_order");
 
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
do
{

 $result2 = mysqli_query($link,"SELECT * FROM table_products WHERE products_id='{$row["buy_id_product"]}'");   
  If (mysqli_num_rows($result2) > 0)
{
 $row2 = mysqli_fetch_array($result2);
}
    
$statuspay = "";
if ($row["order_pay"] == "accepted") $statuspay = "Оплачено";

echo '
 <TR>
<TD  align="CENTER" >'.$row["order_datetime"].'</TD>
<TD  align="CENTER" >'.$row2["title"].'</TD>
<TD  align="CENTER" >'.$row2["price"].'</TD>
<TD  align="CENTER" >'.$statuspay.'</TD>
</TR>
';

	}
     while ($row = mysqli_fetch_array($result));
}     
?>
</TABLE>
</div>
</div>
</body>
</html>
<?php
}else
{
     header("Location: login.php");
}
?>