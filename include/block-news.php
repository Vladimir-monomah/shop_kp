<?php
	defined('it') or die('Доступ запрещён!');
?>
<!--Новостной блок -->
<div id="block-news">
<center><img id="news-prev" src="/images/img-prev.png"/></center>
<!--Новости -->
<div id="newsticker">
<ul type="none">
<?php
	 $result = mysql_query("SELECT * FROM news ORDER BY id DESC",$link);
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
 do
{	

echo '
<li style = "">
<span>'.$row["date"].'</span>
<a href="" >'.localize_text($row[title], $_SESSION["lang"], $link).'</a>
<p>'.localize_text($row[text], $_SESSION["lang"], $link).'</p>
</li>

';

}
 while ($row = mysql_fetch_array($result)); 
} 
?>
</ul>
</div>
<center><img id="news-next" src="/images/img-next.png"/></center>
</div>