<?php
	defined('it') or die('Доступ запрещён!');
?>
<!--Подвал сайта -->
<div id="block-footer">
<!--Линия -->
<div id="button-line"></div>
<!--Телефон -->
<div id="footer-phone">
<h4><?php echo localize_text('Служба поддержки', $_SESSION["lang"], $link); ?></h4>
<h3>8 (986) 500-76-12</h3>
<p>
<?php echo localize_text('Режим работы интернет-магазина', $_SESSION["lang"], $link); ?><br />
<?php echo localize_text('Круглосуточно', $_SESSION["lang"], $link); ?><br />
</p>
</div>
<!--Серфис и помощь -->
<div class="footer-list">
<p><?php echo localize_text('Сервис и помощь', $_SESSION["lang"], $link); ?></p>
<ul type="none">
<li><a href="zakaz.php"><?php echo localize_text('Как сделать заказ', $_SESSION["lang"], $link); ?></a>
<li><a href="oplata.php"><?php echo localize_text('Способ оплаты', $_SESSION["lang"], $link); ?></a></li>
<li><a href="vozvrat.php"><?php echo localize_text('Возврат', $_SESSION["lang"], $link); ?></a></li>
</ul>
</div>
<!--О компании -->
<div class="footer-list">
<p><?php echo localize_text('О компании:', $_SESSION["lang"], $link); ?></p>
<ul type="none">
<li><a href="o_nas.php"><?php echo localize_text('О нас', $_SESSION["lang"], $link); ?></a></li>
</ul>
</div>
<!--Навигация -->
<div class="footer-list">
<p><?php echo localize_text('Навигация', $_SESSION["lang"], $link); ?></p>
<ul type="none">
<li><a href="index.php"><?php echo localize_text('Главная страница', $_SESSION["lang"], $link); ?></a></li>
</ul>
<p><?php echo localize_text('Рассказать о сайте', $_SESSION["lang"], $link); ?></p>
<!--Поделится в социальных сетях -->
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki" data-limit="3"></div>
</div>
</div>