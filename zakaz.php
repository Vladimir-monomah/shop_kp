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
<div class="two"><h1><?php echo localize_text('Простое оформление заказа', $_SESSION["lang"], $link); ?></h1></div>

   <!--Информация по заказу-->
<p><?php echo localize_text('Выбирайте удобный для вас способ заказа!', $_SESSION["lang"], $link); ?></p>
                        <ol class="ui-list-num">
                            <li><b><p align="justify"><?php echo localize_text('Сервис “Купить в 2 клика”.</b> Нет ничего проще! Нажмите на ссылку “Купить в 2 клика” на странице товара, введите свое имя и контактный телефон. Наш оператор перезвонит вам для оформления заказа.', $_SESSION["lang"], $link); ?></li>
                            <li><b><p align="justify"><?php echo localize_text('Полное оформление заказа.</b> Отправьте выбранные товары в корзину, нажав кнопку “Купить” <br> у товара. Обратите внимание, что товары, не имеющие этой кнопки, нельзя заказать в интернет-<br>магазине, они продаются только в магазинах сети. После того, как вы закончили выбор товаров,<br> перейдите в корзину для оформления заказа. Если у нас будут вопросы по заказу, то мы оперативно<br> свяжемся с вами по телефону. А если нет, то будем извещать о судьбе заказа в письмах и sms-сообщениях.', $_SESSION["lang"], $link); ?></li>
                            <li><b><p align="justify"><?php echo localize_text('Регистрация.Зарегистрируйтесь</b> и упростите оформление последующих заказов — вся основная информация<br> будет сохранена в вашем «Личном кабинете».', $_SESSION["lang"], $link); ?></li>
                            <li><b><p align="justify"><?php echo localize_text('Оформление заказа по телефону.</b> Хотите получить консультацию по телефону? Позвоните по<br> бесплатному телефону 8 (986) 500-76-12, и оператор интернет-магазина поможет сделать выбор и оформить заказ.', $_SESSION["lang"], $link); ?></li>
                        </ol>


<?php
    include("include/block-footer.php");    
?>
</div>

</body>
</html>