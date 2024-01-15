<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{  
    define('it', true);
    include("db_connect.php");
    include("../function/function.php");

    $id = clear_string($_POST['id'],$link);
    $name = clear_string($_POST['name'],$link);
    $good = clear_string($_POST['good'],$link);
    $bad =  clear_string($_POST['bad'],$link);
    $comment = clear_string($_POST['comment'],$link);

    mysqli_query($link, "INSERT INTO table_reviews(products_id, name, good_reviews, bad_reviews, comment, date)
                        VALUES(                        
                            ".$id.",
                            '".$name."',
                            '".$good."',
                            '".$bad."',
                            '".$comment."',
                            NOW()							
                        )");
    $lastInsertedId = mysqli_insert_id($link);
    $new_review_result = mysqli_query($link, "SELECT * FROM table_reviews WHERE reviews_id = $lastInsertedId");
    $row_reviews = mysqli_fetch_array($new_review_result);

    echo '
    <div class="block-reviews">
        <p class="author-date"><strong>'.$row_reviews["name"].'</strong>, '.$row_reviews["date"].'</p>
        <img src="/images/plus-reviews.png" />
        <p class="textrev">'.$row_reviews["good_reviews"].'</p>
        <img src="/images/minus-reviews.png" />
        <p class="textrev">'.$row_reviews["bad_reviews"].'</p>
        <p class="text-comment">'.$row_reviews["comment"].'</p>
    </div>
    ';
}
?>