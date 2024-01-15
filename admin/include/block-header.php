<?php
	defined('it') or die('Доступ запрещён!');
    
     $result1 = mysqli_query($link,"SELECT * FROM orders WHERE order_confirmed='no'",$link);
    $count1 = mysqli_num_rows($result1);
    
    if ($count1 > 0) { $count_str1 = '<p>+'.$count1.'</p>'; } else { $count_str1 = ''; }
 
    $result2 = mysqli_query($link,"SELECT * FROM table_reviews WHERE moderat='0'",$link);
    $count2 = mysqli_num_rows($result2);
    
    if ($count2 > 0) { $count_str2 = '<p>+'.$count2.'</p>'; } else { $count_str2 = ''; }
 
?>
<!--Основной блок панели для заголовка сайта-->
<div id="block-header">
<!--Блок Золотая кисть.Администратор-->
<div id="block-header1" >
<h3>Золотая кисть.<br>Администратор</h3>
<p id="link-nav" ><?php echo $_SESSION['urlpage']; ?></p> 
</div>
<!--Ссылка на отображение "кто вы", и ссылка на администраторов-->
<div id="block-header2" >
<p align="right"><a href="administrators.php" >Администраторы/менеджеры</a> | <a href="?logout">Выход</a></p>
<p align="right">Вы - <span><?php echo $_SESSION['admin_role']; ?></span></p>
</div>

</div>
<!--Основновной блок навигации по сайту-->
<div id="left-nav">
<ul>
<li><a href="orders.php">Заказы</a><?php echo $count_str1; ?></li>
<li><a href="tovar.php">Товары</a></li>
<li><a href="reviews.php">Отзывы</a><?php echo $count_str2; ?></li>
<li><a href="category.php">Категории</a></li>
<li><a href="clients.php">Клиенты</a></li>
</ul>
</div>