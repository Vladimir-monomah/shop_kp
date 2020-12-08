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
<div class="two"><h1><?php echo localize_text('Возврат товара', $_SESSION["lang"], $link); ?></h1></div>

   <div id="howtobuy_6">
                        <h3><center><?php echo localize_text('Возврат товара', $_SESSION["lang"], $link); ?></center></h3>
                        <p align="justify"><?php echo localize_text('Вы вправе отказаться от товара в любое время до его передачи, а после передачи товара — в течение семи дней, если сохранены его товарный вид, потребительские свойства, а также документ, подтверждающий факт и условия покупки указанного товара. В остальном, отношения между продавцом и покупателем регулируются', $_SESSION["lang"], $link); ?> <a class="link" href="https://www.consultant.ru/popular/consumerism/" target="_blank"><?php echo localize_text('Законом РФ «О защите прав потребителей»', $_SESSION["lang"], $link); ?></a> <?php echo localize_text('и', $_SESSION["lang"], $link); ?> <a class="link" href="http://base.consultant.ru/cons/cgi/online.cgi?req=doc;base=LAW;n=71418;dst=0;ts=09C118EC3A9300A2CEE5906EC04BC057" target="_blank"><?php echo localize_text('Правилами продажи товаров дистанционным способом', $_SESSION["lang"], $link); ?></a>.</p>
                    </div>


<?php
    include("include/block-footer.php");    
?>
</div>

</body>
</html>