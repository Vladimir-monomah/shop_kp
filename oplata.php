<?php	
  define('it', true);
   include("include/db_connect.php");
   include_once(__DIR__ ."/function/function.php");
   session_start();
   include("include/auth_cookie.php");
   include("function/localization.php");
   
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="images/icon1.png" rel="shortcut icon"  type="image/x-icon" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    <!--подключение иконки сайта -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script> 
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    
<title><?php echo localize_text('Золотая кисть', $_SESSION["lang"], $link); ?></title>
</head>
<body>
<div id="block-body">
<?php	
    include("include/block-header.php");    
?>
<div id="block-left" class="block-left">		
		<?php	
			include("include/block-category.php");
		?>
	</div>
<div class="two"><h1><?php echo localize_text('Оплата заказа', $_SESSION["lang"], $link); ?></h1></div>

   <div id="howtobuy_4">
                        <h3><center><?php echo localize_text('Безопасные способы оплаты', $_SESSION["lang"], $link); ?></center></h3>
                        <h4><?php echo localize_text('Наличными:', $_SESSION["lang"], $link); ?></h4>
                        <ul class="ui-list">
                            <li><?php echo localize_text('На почте', $_SESSION["lang"], $link); ?></li>
                            <li><?php echo localize_text('При доставки курьеру', $_SESSION["lang"], $link); ?></li>
                            <li><?php echo localize_text('В магазине на кассе', $_SESSION["lang"], $link); ?></li>
                        </ul>
                        <h4><?php echo localize_text('Банковской картой:', $_SESSION["lang"], $link); ?></h4>
                        <ul class="ui-list">
                            <li><?php echo localize_text('В магазине на кассе', $_SESSION["lang"], $link); ?></li>
                            <li><?php echo localize_text('Онлайн оплата на сайте', $_SESSION["lang"], $link); ?></li>
                        </ul>
                        <h4><?php echo localize_text('Для оплаты товара необходимо:', $_SESSION["lang"], $link); ?></h4>
                        <ul class="ui-list-nam">
                            <li>
                                <?php echo localize_text('После оформления заказа нажать на кнопку «Оплатить».', $_SESSION["lang"], $link); ?>
                            </li>
                    </div>


<?php
    include("include/block-footer.php");    
?>
</div>

</body>
</html>