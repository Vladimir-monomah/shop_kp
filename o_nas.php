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
<div class="two"><h1><?php echo localize_text('Интернет-магазин Золотая кисть', $_SESSION["lang"], $link); ?></h1></div>

   <!--Информация по интернет-магазину-->
<div id="blockquote">
<p align="justify"><?php echo localize_text('Наш интернет магазин приветствует вас! Добро пожаловать!', $_SESSION["lang"], $link); ?></p>
<p align="justify"><?php echo localize_text('Только мы даем самые низкие цены на свою продукцию, а если вы найдете еще дешевле, то мы снизим цену еще больше.', $_SESSION["lang"], $link); ?></p>
<p align="justify"><?php echo localize_text('Наш интернет магазин вышел на рынок труда ещё не давно, но уже зарекомендовали себя <br> как надежного и уверенного поставщика товара.', $_SESSION["lang"], $link); ?></p>
<p align="justify"><?php echo localize_text('Покупая в нашем магазине, вы будете всегда счастливы и рады вернуться к нам снова.', $_SESSION["lang"], $link); ?></p>
<p align="justify"><?php echo localize_text('Представленный ассортимент является самым широким и у нас есть все, что вам нужно.', $_SESSION["lang"], $link); ?></p>
</div>


<?php
    include("include/block-footer.php");    
?>
</div>

</body>
</html>