<?php
	defined('it') or die('Доступ запрещён!');
	session_start();
?>
<!--Основной верхний блок. -->
<div id="block-header">
<!--Основной блок с навигацией. -->
<div id="header-top-block">
<!--Вход и регистрация. -->
<?php
echo '<p id="reg-auth-title" align="right">';

	// Даём возможность выбора языка
    $available_languages = array(
        "ru" => "Русский",
        "en" => "English");
 echo '<select name="lang" onchange="$.ajax({type: \'POST\',
  url: \'/function/change_lang.php\',
  data: { \'lang\': this.value },
  cache: false,
  success: function() {
    window.location.reload();
  }
});">';
	
 foreach ($available_languages as $lang_key => $lang_name)
 {
    echo '<option value="'.$lang_key.'"';
    if(isset($_SESSION['lang']) && $lang_key == $_SESSION['lang'])
    {
        echo ' selected';
    }
    
    echo '>'.$lang_name.'</option>';
 }
 
 echo '</select>';

if ($_SESSION['auth'] == 'yes_auth')
{
 
 echo '<p id="auth-user-info" align="right"><img src="/images/user.png" />'.localize_text('Здравствуйте, '.$_SESSION['auth_name'].'!', $_SESSION["lang"], $link).'</p>';   
    
}else{
 
  echo '<p id="reg-auth-title" align="right"><a class="top-auth">'  .localize_text('Вход', $_SESSION["lang"], $link).' </a> <a href="registration.php">'.localize_text('Регистрация', $_SESSION["lang"], $link).'</a></p>';   
    
}
?>

<!--Авторизация -->
<div id="block-top-auth">

<!--Указатель -->
<div class="corner"></div>

<form method="post">

<ul id="input-email-pass" type="none">

<h3><?php echo localize_text('Вход', $_SESSION["lang"], $link); ?></h3>

<p id="message-auth"><?php echo localize_text('Неверный Логин и(или) Пароль', $_SESSION["lang"], $link); ?></p>

<li><center><input type="text" id="auth_login" placeholder="Логин или E-mail" /></center></li>
<li><center><input type="password" id="auth_pass" placeholder="Пароль" /><span id="button-pass-show-hide" class="pass-show"></span></center></li>

<ul id="list-auth" type="none">
<li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme"><?php echo localize_text('Запомнить меня', $_SESSION["lang"], $link); ?></label></li>
<li><a id="remindpass" href="#"><?php echo localize_text('Забыли пароль?', $_SESSION["lang"], $link); ?></a></li>
</ul>

<p align="right" id="button-auth" ><a><?php echo localize_text('Вход', $_SESSION["lang"], $link); ?></a></p>

<p align="right" class="auth-loading"><img src="/images/loading.gif" /></p>

</ul>
</form>
<!--Отправка забытого пароля. -->
<div id="block-remind">
<h3><center><?php echo localize_text('Восстановление пароля', $_SESSION["lang"], $link); ?></center></h3>
<p id="message-remind" class="message-remind-success" ></p>
<center><input type="text" id="remind-email" placeholder="<?php echo localize_text('Введите E-mail', $_SESSION["lang"], $link); ?>" /></center>
<p align="right" id="button-remind" ><a><?php echo localize_text('Готово', $_SESSION["lang"], $link); ?></a></p>
<p align="right" class="auth-loading" ><img src="/images/loading.gif" /></p>
<p id="prev-auth"><?php echo localize_text('Назад', $_SESSION["lang"], $link); ?></p>
</div>
</div>
</div>
<!--Линия. -->
<div id="top-line"></div>
<!--Блок профиля. -->
<div id="block-user" >
<div class="corner2"></div>
<ul type="none">
<li><img src="/images/user_info.png" /><a href="profile.php"><?php echo localize_text('Профиль', $_SESSION["lang"], $link); ?></a></li>
<li><img src="/images/logout.png" /><a id="logout" ><?php echo localize_text('Выход', $_SESSION["lang"], $link); ?></a></li>
</ul>
</div>
<!--Слайдер-->
<section class="slider">
	<div class="slider-content">
		<div class="slide sl1"></div>
		<div class="slide sl2"></div>
		<div class="slide sl3"></div>
    <div class="slide sl4"></div>
	</div>
</section>
<!--Форма поиска. -->
<div id="block-search">
<form method="GET" action="search.php?q=">
<span></span>
<input type="text" id="input-search" name="q" placeholder="<?php echo localize_text('Поиск более 100 000 товаров', $_SESSION["lang"], $link); ?>" value="<?php echo $search;?>"/>
<input type="submit" id="button-search" value="<?php echo localize_text('Поиск', $_SESSION["lang"], $link); ?>"/>
</form>

<ul id="result-search" type="none">

</ul>

</div>
</div>
<!--Форма навигации. -->
<div id="top-menu">
<ul type="none">
<li><a href="index.php"><?php echo localize_text('Главная', $_SESSION["lang"], $link); ?></a></li>
<li><a href="view_aystopper.php?go=news"><?php echo localize_text('Новинки', $_SESSION["lang"], $link); ?></a></li>
<li><a href="view_aystopper.php?go=sale"><?php echo localize_text('Акции', $_SESSION["lang"], $link); ?></a></li>
</ul>
<p align="right" id="block-basket"><img src="/images/cart-icon.png"/><a href="cart.php?action=oneclick"><?php echo localize_text('Корзина пуста', $_SESSION["lang"], $link); ?></a></p>
<div id="nav-line"></div>
</div>