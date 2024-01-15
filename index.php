<?php
        define('it', true);
       include_once("include/db_connect.php");
       include("function/function.php");
       include("function/localization.php");
       session_start();
       include("include/auth_cookie.php");
       
$sorting = $_GET["sort"];   
 
switch ($sorting)
{
    case 'price-asc';
    $sorting = 'price ASC';
    $sort_name = 'От дешевых к дорогим';
    break;

    case 'price-desc';
    $sorting = 'price DESC';
    $sort_name = 'От дорогих к дешевым';
    break;
    
    case 'popular';
    $sorting = 'count DESC';
    $sort_name = 'Популярное';
    break;
    
    case 'news';
    $sorting = 'datetime DESC';
    $sort_name = 'Новинки';
    break;
    
    case 'brand';
    $sorting = 'brand';
    $sort_name = 'Новинки';
    break;
    
    default:
    $sorting = 'products_id DESC';
    $sort_name = 'Нет сортировки';
    break;                           
} 

?>
<!--Элемент DOCTYPE -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--Атрибут, указывающий на язык -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
<head>
    <!--Кодировка -->
	<meta http-equiv="content-type" content="text/html" />
	<!--подключение кроссбраузерности -->
    <meta name="viewport" content="width=device-width, inital-scale=1"/>
    <meta name=viewport content="width=720">
    <!--подключение стилей -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!--Подключение ползунка -->
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    <!--подключение иконки сайта -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    
<!--Подключение скриптов -->
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script lang="text/javascript" src="js/collect_pluso.js"></script>
    <script lang="text/javascript" src="js/pluso-like_2.js"></script>
    <script lang="text/javascript" src="js/jquery.cookie.min.js"></script>
    <script lang="text/javascript" src="trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox.css" />
    <script type="text/javascript" src="/fancybox/jquery.fancybox.js"></script>
    
    
	<title><?php echo localize_text('Золотая кисть', $_SESSION["lang"], $link); ?> </title>
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
<!--Основной блок контента -->
<div id="block-content">
<!--Основной блок сортировки -->
<div id="block-sorting">
<p id="nav-breadcrumbs"><a href="index.php"><?php echo localize_text('Главная страница', $_SESSION["lang"], $link); ?></a> \ <span><?php echo localize_text('Все товары', $_SESSION["lang"], $link); ?></span></p>
<ul id="options-list" type="none">
<li><?php echo localize_text('Вид:', $_SESSION["lang"], $link); ?></li>
<li><img id="style-grid" src="/images/icon-grid.png"/></li>
<li><img id="style-list" src="/images/icon-list.png"/></li>
<li><?php echo localize_text('Сортировка', $_SESSION["lang"], $link); ?></li>
<li><a id="select-sort"><?php echo localize_text($sort_name, $_SESSION["lang"], $link)?></a>
<ul id="sorting-list" type="none">
<li><a href="index.php?sort=price-asc" ><?php echo localize_text('От дешёвых к дорогим', $_SESSION["lang"], $link); ?></a></li>
<li><a href="index.php?sort=price-desc" ><?php echo localize_text('От дорогих к дешёвым', $_SESSION["lang"], $link); ?></a></li>
<li><a href="index.php?sort=popular"><?php echo localize_text('Популярное', $_SESSION["lang"], $link); ?></a></li>
<li><a href="index.php?sort=news" ><?php echo localize_text('Новинки', $_SESSION["lang"], $link); ?></a></li>
<li><a href="index.php?sort=btand" ><?php echo localize_text('От А до Я', $_SESSION["lang"], $link); ?></a></li>
</ul>
</li>
</ul>
</div>
<!--Основной блок расположения товаров на главном экране в столбик -->
<ul id="block-tovar-grid" type="none">

<?php

$num = 4; // Здесь указываем сколько хотим выводить товаров.
$page = (int)$_GET['page'];

$count = mysqli_query($link, "SELECT COUNT(*) FROM table_products WHERE visible = '1'");
$temp = mysqli_fetch_array($count);

if ($temp[0] > 0) {
    $tempcount = $temp[0];

    // Находим общее число страниц
    $total = (($tempcount - 1) / $num) + 1;
    $total =  intval($total);

    $page = intval($page);

    if (empty($page) or $page < 0) $page = 1;

    if ($page > $total) $page = $total;

    // Вычисляем начиная с какого номера
    // следует выводить товары 
    $start = $page * $num - $num;

    $qury_start_num = " LIMIT $start, $num";
}




$result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' ORDER BY $sorting $qury_start_num");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    do {
        if ($row["image"] != "" && file_exists("./uploads_images/" . $row["image"])) {
            $img_path = './uploads_images/' . $row["image"];
            $max_width = 200;
            $max_height = 200;
            list($width, $height) = getimagesize($img_path);
            $ratioh = $max_height / $height;
            $ratiow = $max_width / $width;
            $ratio = min($ratioh, $ratiow);
            $width = intval($ratio * $width);
            $height = intval($ratio * $height);
        } else {
            $img_path = "/images/no-image.png";
            $width = 110;
            $height = 200;
        }

        // Количество отзывов 
        $query_reviews = mysqli_query($link, "SELECT * FROM table_reviews WHERE products_id = '{$row["products_id"]}' AND moderat='1'");
        $count_reviews = mysqli_num_rows($query_reviews);

        echo '

   <li>
  <div class="block-images-grid">
  <a class="product-image" href="' . $img_path . '"><img src="' . $img_path . '" width="' . $width . '" height="' . $height . '"/></a>
  </div>
        <p class="style-title-grid"><a href="view_content.php?id=' . $row["products_id"] . '">' . localize_text($row['title'], $_SESSION["lang"], $link) . '</a></p>
  <a class="add-cart-style-grid" tid="' . $row["products_id"] . '"></a>
  <p class="style-price-grid" ><strong>' . group_numerals($row['price']) . '</strong> ' . localize_text('руб.', $_SESSION["lang"], $link) . '</p>
  <div class="mini-features" >
  ' . localize_text($row["mini_features"], $_SESSION["lang"], $link) . '
  </div>
  </li>
  
  ';

    } while ($row = mysqli_fetch_array($result));
}

?>

</ul>
<!--Основной блок расположения товаров на главном экране в строку -->
<ul id="block-tovar-list" type="none">

    <?php
    $result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1'ORDER BY $sorting $qury_start_num");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        do {
            if ($row["image"] != "" && file_exists("./uploads_images/" . $row["image"])) {
                $img_path = './uploads_images/' . $row["image"];
                $max_width = 150;
                $max_height = 150;
                list($width, $height) = getimagesize($img_path);
                $ratioh = $max_height / $height;
                $ratiow = $max_width / $width;
                $ratio = min($ratioh, $ratiow);
                $width = intval($ratio * $width);
                $height = intval($ratio * $height);
            } else {
                $img_path = "/images/noimages80x70.png";
                $width = 80;
                $height = 70;
            }

            // Количество отзывов 
            $query_reviews = mysqli_query($link, "SELECT * FROM table_reviews WHERE products_id = '{$row["products_id"]}' AND moderat='1'");
            $count_reviews = mysqli_num_rows($query_reviews);

            echo '

   <li>
  <div class="block-images-list">
  <img src="' . $img_path . '" width="' . $width . '" height="' . $height . '"/>
  </div>
  
  <p class="style-title-list"><a href="view_content.php?id=' . $row["products_id"] . '">' . localize_text($row['title'], $_SESSION["lang"], $link) . '</a></p>
  
  <a class="add-cart-style-list" tid="' . $row["products_id"] . '"></a>
  <p class="style-price-list" ><strong>' . group_numerals($row['price']) . '</strong>' . localize_text('руб.', $_SESSION["lang"], $link) . '</p>
  <div class="style-text-list" >
  ' . localize_text($row["mini_description"], $_SESSION["lang"], $link) . '
  </div>
  </li>
  
  ';

        } while ($row = mysqli_fetch_array($result));
    }

    echo '</ul>';
    if ($page != 1) {
        $pstr_prev = '<li><a class="pstr-prev" href="index.php?page=' . ($page - 1) . '">&lt;</a></li>';
    }
    if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="index.php?page=' . ($page + 1) . '">&gt;</a></li>';


    // Формируем ссылки со страницами
    if ($page - 5 > 0) $page5left = '<li><a href="index.php?page=' . ($page - 5) . '">' . ($page - 5) . '</a></li>';
    if ($page - 4 > 0) $page4left = '<li><a href="index.php?page=' . ($page - 4) . '">' . ($page - 4) . '</a></li>';
    if ($page - 3 > 0) $page3left = '<li><a href="index.php?page=' . ($page - 3) . '">' . ($page - 3) . '</a></li>';
    if ($page - 2 > 0) $page2left = '<li><a href="index.php?page=' . ($page - 2) . '">' . ($page - 2) . '</a></li>';
    if ($page - 1 > 0) $page1left = '<li><a href="index.php?page=' . ($page - 1) . '">' . ($page - 1) . '</a></li>';

    if ($page + 5 <= $total) $page5right = '<li><a href="index.php?page=' . ($page + 5) . '">' . ($page + 5) . '</a></li>';
    if ($page + 4 <= $total) $page4right = '<li><a href="index.php?page=' . ($page + 4) . '">' . ($page + 4) . '</a></li>';
    if ($page + 3 <= $total) $page3right = '<li><a href="index.php?page=' . ($page + 3) . '">' . ($page + 3) . '</a></li>';
    if ($page + 2 <= $total) $page2right = '<li><a href="index.php?page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>';
    if ($page + 1 <= $total) $page1right = '<li><a href="index.php?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>';


    if ($page + 5 < $total) {
        $strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page=' . $total . '">' . $total . '</a></li>';
    } else {
        $strtotal = "";
    }

    if ($total > 1) {
        echo '
    <div class="pstrnav">
    <ul type="none">
    ';
        echo $pstr_prev . $page5left . $page4left . $page3left . $page2left . $page1left . "<li><a class='pstr-active' href='index.php?page=" . $page . "'>" . $page . "</a></li>" . $page1right . $page2right . $page3right . $page4right . $page5right . $strtotal . $pstr_next;
        echo '
    </ul>
    </div>
    ';
    }

    ?>
</div>

<?php
include("include/block-random.php");
include("include/block-footer.php");

?>

</div>
</body>
</html>