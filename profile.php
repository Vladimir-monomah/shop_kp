<?php
define('it', true);	
session_start();

if ($_SESSION['auth'] == 'yes_auth')
{
       include("include/db_connect.php");
       include("function/function.php");
       include("function/localization.php");
       
   if ($_POST["save_submit"])
     {
        
    $_POST["info_surname"] = clear_string($_POST["info_surname"],$link);
    $_POST["info_name"] = clear_string($_POST["info_name"],$link);
    $_POST["info_patronymic"] = clear_string($_POST["info_patronymic"],$link);
    $_POST["info_address"] = clear_string($_POST["info_address"],$link);
    $_POST["info_phone"] = clear_string($_POST["info_phone"],$link);
    $_POST["info_email"] = clear_string($_POST["info_email"],$link);     
              
    $error = array();
	
    $pass   = md5($_POST["info_pass"]);
    $pass   = strrev($pass);
    $pass   = "9nm2rv8q".$pass."2yo6z";
    
	if($_SESSION['auth_pass'] != $pass)
	{
		$error[]='Неверный текущий пароль!';
	}else
    {
        
      if($_POST["info_new_pass"] != "")
	{
		        if(strlen($_POST["info_new_pass"]) < 3 || strlen($_POST["info_new_pass"]) > 15)
            	{
		           $error[]='Укажите новый пароль от 3 до 15 символов!';
	            }else
                {
                     $newpass   = md5(clear_string($_POST["info_new_pass"],$link));
                     $newpass   = strrev($newpass);
                     $newpass   = "9nm2rv8q".$newpass."2yo6z";
                     $newpassquery = "pass='".$newpass."',";
                }
	}
    
    
    
        if(strlen($_POST["info_surname"]) < 3 || strlen($_POST["info_surname"]) > 20)
	{
		$error[]='Укажите Фамилию от 3 до 20 символов!';
	}
    
    
        if(strlen($_POST["info_name"]) < 3 || strlen($_POST["info_name"]) > 50)
	{
		$error[]='Укажите Имя от 3 до 50 символов!';
	}
    
    
        if(strlen($_POST["info_patronymic"]) < 3 || strlen($_POST["info_patronymic"]) > 25)
	{
		$error[]='Укажите Отчество от 3 до 25 символов!';
	}  
    
    
         if (!preg_match("/^(?:[a-z0-9]+(?:[a-z0-9-._]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["info_email"])))
	{
		$error[]='Укажите корректный email!';
	}
    
      if(strlen($_POST["info_phone"]) == "")
	{
		$error[]='Укажите номер телефона!';
	} 
    
      if(strlen($_POST["info_address"]) == "")
	{
		$error[]='Укажите адрес доставки!';
	}      
    
    
        
    }
    
    if (count($error)) {
        $_SESSION['msg'] = "<p align='left' id='form-error'>" . implode('<br />', $error) . "</p>";
    } else {
        $_SESSION['msg'] = "<p align='left' id='form-success'>Данные успешно изменены!</p>";
    
        $dataquery = $newpassquery . "surname='" . $_POST["info_surname"] . "',name='" . $_POST["info_name"] . "',patronymic='" . $_POST["info_patronymic"] . "',email='" . $_POST["info_email"] . "',phone='" . $_POST["info_phone"] . "',address='" . $_POST["info_address"] . "'";
        
        $update = mysqli_query($link, "UPDATE reg_user SET $dataquery WHERE login = '{$_SESSION['auth_login']}'");
        
        if ($newpass) {
            $_SESSION['auth_pass'] = $newpass;
        }
    
        $_SESSION['auth_surname'] = $_POST["info_surname"];
        $_SESSION['auth_name'] = $_POST["info_name"];
        $_SESSION['auth_patronymic'] = $_POST["info_patronymic"];
        $_SESSION['auth_address'] = $_POST["info_address"];
        $_SESSION['auth_phone'] = $_POST["info_phone"];
        $_SESSION['auth_email'] = $_POST["info_email"];
    }
    
       
       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script lang="text/javascript" src="js/collect_pluso.js"></script>
    <script lang="text/javascript" src="js/pluso-like_2.js"></script>
    <script lang="text/javascript" src="js/jquery.cookie.min.js"></script>
    <script lang="text/javascript" src="trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    
	<title><?php echo localize_text('Золотая кисть', $_SESSION["lang"], $link); ?></title>
</head>
<body>
<!--Основной блок тела сайта -->
<div id="block-body">

<?php	
    include("include/block-header.php");
?>
<!--Основной блок расположения информации справа страницы -->
	<div id="block-left" class="block-left">
	<?php	
		include("include/block-category.php");
		include("include/block-parameter.php");
	?>
	</div>
</div>
<!--Основной блок изменения профиля -->
<div id="block-content">
<h1 class="title-h1" ><center><?php echo localize_text('Изменение профиля', $_SESSION["lang"], $link); ?></center></h1>

<?php
	
    if($_SESSION['msg'])
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
    
?>

<form method="post">

<ul id="info-profile" type="none">
<li>
<label for="info_pass"><?php echo localize_text('Текущий пароль', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<input type="text" name="info_pass" id="info_pass" value="" />
</li>

<li>
<label for="info_new_pass"><?php echo localize_text('Новый пароль', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<input type="text" name="info_new_pass" id="info_new_pass" value="" />
</li>

<li>
<label for="info_surname"><?php echo localize_text('Фамилия', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<input type="text" name="info_surname" id="info_surname" value="<?php echo $_SESSION['auth_surname']; ?>"  />
</li>

<li>
<label for="info_name"><?php echo localize_text('Имя', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<input type="text" name="info_name" id="info_name" value="<?php echo $_SESSION['auth_name']; ?>"  />
</li>

<li>
<label for="info_patronymic"><?php echo localize_text('Отчество', $_SESSION["lang"], $link); ?></label>
<input type="text" name="info_patronymic" id="info_patronymic" value="<?php echo $_SESSION['auth_patronymic']; ?>" />
</li>


<li>
<label for="info_email"><?php echo localize_text('E-mail', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<input type="text" name="info_email" id="info_email" value="<?php echo $_SESSION['auth_email']; ?>" />
</li>

<li>
<label for="info_phone"><?php echo localize_text('Телефон', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<input type="text" name="info_phone" id="info_phone" value="<?php echo $_SESSION['auth_phone']; ?>" />
</li>

<li>
<label for="info_address"><?php echo localize_text('Адрес доставки', $_SESSION["lang"], $link); ?></label>
<span class="star">*</span>
<textarea name="info_address"> <?php echo $_SESSION['auth_address']; ?> </textarea>
</li>
</ul>
<br />
 <p align="center"><input type="submit" id="form_submit" name="save_submit" value="Сохранить изменение профиля" /></p>
</form>
</div>

<?php
    include("include/block-footer.php");
?>

</div>
</body>
</html>
<?php
} else{header("Location: index.php");}
?>