<?php
  define('it', true);	
  include("include/db_connect.php"); 
  include("function/function.php");  
  session_start();
  include("include/auth_cookie.php");
  include("function/localization.php");
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
    
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script>  
    <script type="text/javascript" src="/js/TextChange.js"></script>  
	
    <script type="text/javascript">$(document).ready(function () {
    $('#form_reg').validate({
        // Правила для проверки
        rules: {
            "reg_login": {
                required: true,
                minlength: 5,
                maxlength: 15,
                remote: {
                    type: "post",
                    url: "/reg/check_login.php"
                }
            },
            "reg_pass": {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            "reg_surname": {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            "reg_name": {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            "reg_patronymic": {
                required: false,
                minlength: 3,
                maxlength: 40
            },
            "reg_email": {
                required: true,
                email: true
            },
            "reg_phone": {
                required: true
            },
            "reg_address": {
                required: true
            },
            "reg_captcha": {
                required: true,
                remote: {
                    type: "post",
                    url: "/reg/check_captcha.php"
                }
            }
        },

        // Выводимые сообщения при нарушении соответствующих правил
        messages: {
            "reg_login": {
                required: "Укажите Логин!",
                minlength: "От 5 до 15 символов!",
                maxlength: "От 5 до 15 символов!",
                remote: "Логин занят!"
            },
            "reg_pass": {
                required: "Укажите Пароль!",
                minlength: "От 3 до 15 символов!",
                maxlength: "От 3 до 15 символов!"
            },
            "reg_surname": {
                required: "Укажите вашу Фамилию!",
                minlength: "От 3 до 20 символов!",
                maxlength: "От 3 до 20 символов!"
            },
            "reg_name": {
                required: "Укажите ваше Имя!",
                minlength: "От 3 до 50 символов!",
                maxlength: "От 3 до 50 символов!"
            },
            "reg_patronymic": {
                required: "Укажите ваше Отчество!",
                minlength: "От 3 до 25 символов!",
                maxlength: "От 3 до 25 символов!"
            },
            "reg_email": {
                required: "Укажите свой E-mail",
                email: "Не корректный E-mail"
            },
            "reg_phone": {
                required: "Укажите номер телефона!"
            },
            "reg_address": {
                required: "Необходимо указать адрес доставки!"
            },
            "reg_captcha": {
                required: "Введите код с картинки!",
                remote: "Не верный код проверки!"
            }
        },

        submitHandler: function (form) {
            $(form).ajaxSubmit({
                success: function (data) {
                    if (data === 'true') {
                        $("#block-form-registration").fadeOut(
                            300,
                            function () {
                                $("#reg_message").addClass("reg_message_good")
                                    .fadeIn(400)
                                    .html("Регистрация прошла успешно!");
                                $("#form_submit").hide();
                                setTimeout(
                                    function(){
                                        window.location = "https://goldenbrush1.000webhostapp.com/index.php";
                                    },
                                    3000);
                            });
                    } else {
                        $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
                    }
                }
            });
        }
    });
});
</script>
    <title><?php echo localize_text('Регистрация', $_SESSION["lang"], $link); ?></title>
</head>
<body>
<!--Основной блок регистрации -->
<div id="block-body">
<?php	
    include("include/block-header.php");    
?>
<!--Блок данных справа -->
<div class="right-block-menu-container">
	<input type="checkbox" name="right-block-menu" id="toggle-right-block" class="toggle-right-block">
	<label for="toggle-right-block" class="toggle-right-block header-title">Меню</label>
	
		<div id="block-left" class="block-left">
	<?php	
		include("include/block-category.php");
		include("include/block-parameter.php");
	?>
	</div>
</div>
<!--Основной блок контента -->
<div id="block-content">

<h1 class="h1-title"><center><?php echo localize_text('Регистрация', $_SESSION["lang"], $link); ?></center></h1>
<form method="post" id="form_reg" action="/reg/handler_reg.php">
<p id="reg_message"></p>
<!--Поля регистрации -->
<div id="block-form-registration">
<ul id="form-registration" type="none">

<li>
<label><?php echo localize_text('Логин', $_SESSION["lang"], $link); ?></label>
<span class="star" >*</span>
<input type="text" name="reg_login" id="reg_login" maxlength="20" />
</li>

<li>
<label><?php echo localize_text('Пароль', $_SESSION["lang"], $link); ?></label>
<span class="star" >*</span>
<input type="text" name="reg_pass" id="reg_pass" maxlength="20" />
<span id="genpass"><?php echo localize_text('Сгенерировать', $_SESSION["lang"], $link); ?></span>
</li>

<li>
<label><?php echo localize_text('Фамилия', $_SESSION["lang"], $link); ?></label>
<span class="star" >*</span>
<input type="text" name="reg_surname" id="reg_surname" maxlength="50" />
</li>

<li>
<label><?php echo localize_text('Имя', $_SESSION["lang"], $link); ?></label>
<span class="star" >*</span>
<input type="text" name="reg_name" id="reg_name"  maxlength="50" />
</li>

<li>
<label><?php echo localize_text('Отчество', $_SESSION["lang"], $link); ?></label>
<input type="text" name="reg_patronymic" id="reg_patronymic"  maxlength="50"/>
</li>

<li>
<label>E-mail</label>
<span class="star" >*</span>
<input type="text" name="reg_email" id="reg_email" maxlength="50" />
</li>

<li>
<label><?php echo localize_text('Мобильный телефон', $_SESSION["lang"], $link); ?></label>
<span class="star" >*</span>
<input type="text" name="reg_phone" id="reg_phone" maxlength="20" />
</li>

<li>
<label><?php echo localize_text('Адрес доставки', $_SESSION["lang"], $link); ?></label>
<span class="star" >*</span> 
<input type="text" name="reg_address" id="reg_address" maxlength="200" />
</li>
<!--Блок ввода защитного кода -->
<li>
<div id="block-captcha">

<img src="/reg/reg_captcha.php" />
<input type="text" name="reg_captcha" id="reg_captcha" />

<p id="reloadcaptcha"><?php echo localize_text('Обновить', $_SESSION["lang"], $link); ?></p>
</div>
</li>

</ul>
</div>

<p align="center"><input type="submit" name="reg_submit" id="form_submit" value="Зарегистрироваться" /></p>

</form>
</div>

<?php	
    include("include/block-footer.php");    
?>
</div>

</body>
</html>