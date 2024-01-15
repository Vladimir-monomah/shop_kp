<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('it', true);
    include("db_connect.php");
    include("../function/function.php");

    $search = iconv("UTF-8", "cp1251", strtolower(clear_string($_POST['text'],$link)));

    $result = mysqli_query($link, "SELECT * FROM table_products WHERE title LIKE '%$search%' AND visible = '1'");

    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_query($link, "SELECT * FROM table_products WHERE title LIKE '%$search%' AND visible = '1' LIMIT 10");
        $row = mysqli_fetch_array($result);
        do {
            echo '
<li><a href="search.php?q=' . $row["title"] . '">' . $row["title"] . '</a></li>
';
        } while ($row = mysqli_fetch_array($result));
    }
}
?>
