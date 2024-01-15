<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('it', true);
       
    if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
        exit; // Добавляем exit, чтобы прервать выполнение скрипта после перенаправления
    }

    $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \\ <a href='tovar.php' >Товары</a> \\ <a>Новый товар</a>";
  
    include("include/db_connect.php");
    include("include/function.php"); 

    if (isset($_POST["submit_add"]))
    {
        if ($_SESSION['add_tovar'] == '1')
        {
            $error = array();
        
            // Проверка полей
        
            if (!$_POST["form_title"])
            {
                $error[] = "Укажите название товара";
            }
            
            if (!$_POST["form_price"])
            {
                $error[] = "Укажите цену";
            }
                
            if (!$_POST["form_category"])
            {
                $error[] = "Укажите категорию";         
            }
            else
            {
                $result = mysqli_query($link,"SELECT * FROM category WHERE id='{$_POST["form_category"]}'",$link);
                $row = mysqli_fetch_array($result);
                $selectbrand = $row["brand"];
            }
            
            // Проверка чекбоксов
            
            $chk_visible = isset($_POST["chk_visible"]) ? "1" : "0";
            $chk_new = isset($_POST["chk_new"]) ? "1" : "0";
            $chk_leader = isset($_POST["chk_leader"]) ? "1" : "0";
            $chk_sale = isset($_POST["chk_sale"]) ? "1" : "0";
            
            if (count($error)) {           
                $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
            } else {
                mysqli_query($link,"INSERT INTO table_products(title,price,brand,seo_words,seo_description,mini_description,description,mini_features,features,new,leader,sale,visible,type_tovara,brand_id, datetime)
                    VALUES(						
                        '".mysqli_real_escape_string($link, $_POST["form_title"])."',
                        '".mysqli_real_escape_string($link, $_POST["form_price"])."',
                        '".mysqli_real_escape_string($link, $selectbrand)."',
                        '".mysqli_real_escape_string($link, $_POST["form_seo_words"])."',
                        '".mysqli_real_escape_string($link, $_POST["form_seo_description"])."',
                        '".mysqli_real_escape_string($link, $_POST["txt1"])."',
                        '".mysqli_real_escape_string($link, $_POST["txt2"])."',
                        '".mysqli_real_escape_string($link, $_POST["txt3"])."',
                        '".mysqli_real_escape_string($link, $_POST["txt4"])."',
                        '".mysqli_real_escape_string($link, $chk_new)."',
                        '".mysqli_real_escape_string($link, $chk_leader)."',
                        '".mysqli_real_escape_string($link, $chk_sale)."',
                        '".mysqli_real_escape_string($link, $chk_visible)."',
                        '".mysqli_real_escape_string($link, $_POST["form_type"])."',
                        '".mysqli_real_escape_string($link, $_POST["form_category"])."',
                        NOW()
                    )");
                if (mysqli_error($link)) {
                    $_SESSION['message'] = "<p id='form-error'>Ошибка: " . mysqli_error($link) . "</p>";
                } else {
                    $id = mysqli_insert_id($link);
                    $_SESSION['message'] = "<p id='form-success'>Товар успешно добавлен в базу данных!</p>";
                }
            }
    
            if (empty($_POST["upload_image"]))
            {        
                include("actions/upload_gallery.php");
                unset($_POST["upload_image"]);           
            } 
            
            if (empty($_POST["galleryimg"]))
            {        
                include("actions/upload_image.php"); 
                unset($_POST["galleryimg"]);                 
            }
        }    
    } 
    else
    {
        $msgerror = 'У вас нет прав на добавление товаров!'; 
    }         
}   
else
{
    header("Location: login.php");
    exit; // Добавляем exit, чтобы прервать выполнение скрипта после перенаправления
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script>   
    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>  
	<title>Панель для Администратора</title>
</head>
<body>
<!--Основной блок тела сайта -->
<div id="block-body">
<?php
	include("include/block-header.php");
?>
<!--Основной блок контента -->
<div id="block-content">
<!--Основной блок добавление нового товара -->
<div id="block-parameters">
<p id="title-page" >Добавление нового товара</p>
</div>
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

		 if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}
        
     if(isset($_SESSION['answer']))
		{
		echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		} 
?>
<!--Форма для добавления товара -->
<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">

<li>
<label>Наименование товара</label>
<input type="text" name="form_title" />
</li>

<li>
<label>Цена</label>
<input type="text" name="form_price"  />
</li>

<li>
<label>Ключевые слова</label>
<input type="text" name="form_seo_words"  />
</li>

<li>
<label>Краткое описание</label>
<textarea name="form_seo_description"></textarea>
</li>
<li>
<label>Тип товара</label>
<select name="form_type" id="type" size="1" >

<option value="paper" >Бумага</option>
<option value="paints" >Краски</option>
<option value="graphics" >Графика</option>
<option value="other" >Прочее</option>

</select>
</li>

<li>
<label>Категория</label>
<select name="form_category" size="10" >

<?php
$category = mysql_query("SELECT * FROM category",$link);
    
If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
  
  echo '
  
  <option value="'.$result_category["id"].'" >'.$result_category["brand"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
?> 

</select>
</ul> 
<label class="stylelabel" >Картинка товара</label>

<div id="baseimg-upload">
    <input type="file" name="upload_image" size="10485760" style="display:inline;width: 220px;">
    <div style="display:inline;font: 14px sans-serif;color: red;">(максимум 10 МБ)</div>
</div>

<h3 class="h3click" >Краткое описание товара</h3>
<div class="div-editor1" >
<textarea id="editor1" name="txt1" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor1" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
 </div>       
 
<h3 class="h3click" >Описание товара</h3>
<div class="div-editor2" >
<textarea id="editor2" name="txt2" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor2" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
 </div>          

<h3 class="h3click" >Краткие характеристики</h3>
<div class="div-editor3" >
<textarea id="editor3" name="txt3" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor3" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
 </div>        

<h3 class="h3click" >Характеристики</h3>
<div class="div-editor4" >
<textarea id="editor4" name="txt4" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor4" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
  </div> 

<label class="stylelabel" >Галлерея картинок товара</label>

<div id="objects" >

<div id="addimage1" class="addimage">
    <input type="file" name="galleryimg[]" style="display:inline;width: 220px;">
    <div style="display:inline;font: 14px sans-serif;color: red;">(максимум 20 МБ)</div>
</div>

</div>

<p id="add-input" >Добавить</p>
     
<h3 class="h3title" >Настройка товара</h3>   
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" /><label for="chk_visible" >Показывать товар</label></li>
<li><input type="checkbox" name="chk_new" id="chk_new"  /><label for="chk_new" >Новый товар</label></li>
<li><input type="checkbox" name="chk_sale" id="chk_sale"  /><label for="chk_sale" >Товар по акции</label></li>
</ul> 


    <p align="right" ><input type="submit" id="submit_form" name="submit_add" value="Добавить товар"/></p>     
</form>


</div>
</div>
</body>
</html>
<?php
{
    header("Location: login.php");
}
?>