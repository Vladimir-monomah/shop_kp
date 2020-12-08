<?php
   define('it', true);	
   include("include/db_connect.php");
   include("function/function.php");
   session_start();
   include("include/auth_cookie.php");
      include("function/localization.php");

if ($_POST["send_message"])
{
    $error = array();
    
  if (!$_POST["feed_name"]) $error[] = localize_text('Укажите своё имя', $_SESSION["lang"], $link);  
  
  if(!preg_match("/^(?:[a-z0-9]+(?:[a-z0-9-._]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["feed_email"])))
  {
    $error[] = localize_text('Укажите корректный E-mail', $_SESSION["lang"], $link); 
  }
   
  if (!$_POST["feed_subject"]) $error[] = localize_text('Укажите тему письма!', $_SESSION["lang"], $link);;  
  if (!$_POST["feed_text"]) $error[] = localize_text('Укажите текст сообщения', $_SESSION["lang"], $link);;  
  
  if (strtolower($_POST["reg_captcha"]) != $_SESSION['img_captcha'])
  {
    $error[] = localize_text('Неверный код с картинки!', $_SESSION["lang"], $link);
  }  
    
   
   if (count($error))
   {
     $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";  
      
   }else
   {
    	         send_mail($_POST["feed_email"],
						       'yana.burmak@mail.ru',
						$_POST["feed_subject"],
						'От: '.$_POST["feed_name"].'<br/>'.$_POST["feed_text"]); 
    
     $_SESSION['message'] = "<p id='form-success'>Ваше сообщение успешно отправлено!</p>";   
    
   }
    
}     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script> 
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    
	<title><?php echo localize_text('Золотая Кисть', $_SESSION["lang"], $link); ?></title>
</head>
<body>
<div id="block-body">
<?php	
    include("include/block-header.php");    
?>
<div id="block-left" class="block-left">
	<?php	
		include("include/block-category.php");
		include("include/block-parameter.php");
	?>
	</div>
</div>
<div id="block-content">
<?php
   if(isset($_SESSION['message']))
	{
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	}
?>
<form method="post">
<div id="block-feedback">
<ul id="feedback" type="none">

<li><label><?php echo localize_text('Ваше имя', $_SESSION["lang"], $link); ?></label><input type="text" name="feed_name"  /></li>
<li><label><?php echo localize_text('Ваш E-mail', $_SESSION["lang"], $link); ?></label><input type="text" name="feed_email"  /></li>
<li><label><?php echo localize_text('Тема', $_SESSION["lang"], $link); ?></label><input type="text" name="feed_subject"  /></li>
<li><label><?php echo localize_text('Текст сообщения', $_SESSION["lang"], $link); ?></label><textarea name="feed_text" ></textarea></li>

<li>
<label for="reg_captcha"><?php echo localize_text('Защитный код', $_SESSION["lang"], $link); ?></label>
<div id="block-captcha">
<img src="/reg/reg_captcha.php" />
<input type="text" name="reg_captcha" id="reg_captcha" />
<p id="reloadcaptcha"><?php echo localize_text('Обновить', $_SESSION["lang"], $link); ?></p>
</div>
</li>

</ul>
</div>
<p align="center"><input type="submit" name="send_message" id="form_submit" /></p>
</form>

</div>

<?php
    include("include/block-random.php");	
    include("include/block-footer.php");    
?>
</div>

</body>
</html>