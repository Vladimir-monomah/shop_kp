<?php
  defined('it') or die('Доступ запрещён!');
  include_once(__DIR__ ."/../function/localization.php");
?>
<!--Список категорий товаров. -->
<div id="block-category">
  <p class="header-title"><?php echo localize_text('Категории товаров', $_SESSION["lang"], $link); ?></p>
  <!--Бумага. -->
  <ul class="category-outer" type="none">
    <li><a id="index1"><?php echo localize_text('Бумага', $_SESSION["lang"], $link); ?></a>
      <ul class="category-section" type="none">
        <li><a href="view_cat.php?type=paper"><strong><?php echo localize_text('Вывести всё', $_SESSION["lang"], $link); ?></strong> </a></li>

        <?php
          $result = mysqli_query($link, "SELECT * FROM category WHERE type='paper'");

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
              echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
            }
          }
        ?>

      </ul>
    </li>
    <!--Краски. -->
    <li><a id="index2"><?php echo localize_text('Краски', $_SESSION["lang"], $link); ?></a>
      <ul class="category-section" type="none">
        <li><a href="view_cat.php?type=paints"><strong><?php echo localize_text('Вывести всё', $_SESSION["lang"], $link); ?></strong> </a></li>

        <?php
          $result = mysqli_query($link, "SELECT * FROM category WHERE type='paints'");

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
              echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
            }
          }
        ?>

      </ul>
    </li>
    <!--Графика. -->
    <li><a id="index3"><?php echo localize_text('Графика', $_SESSION["lang"], $link); ?></a>
      <ul class="category-section" type="none">
        <li><a href="view_cat.php?type=graphics"><strong><?php echo localize_text('Вывести всё', $_SESSION["lang"], $link); ?></strong> </a></li>

        <?php
          $result = mysqli_query($link, "SELECT * FROM category WHERE type='graphics'");

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
              echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
            }
          }
        ?>

      </ul>
    </li>

    <!--Прочие. -->
    <li><a id="index4"><?php echo localize_text('Прочие', $_SESSION["lang"], $link); ?></a>
      <ul class="category-section" type="none">
        <li><a href="view_cat.php?type=other"><strong><?php echo localize_text('Вывести всё', $_SESSION["lang"], $link); ?></strong> </a></li>

        <?php
          $result = mysqli_query($link, "SELECT * FROM category WHERE type='other'");

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
              echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
            }
          }
        ?>

      </ul>
    </li>
  </ul>
</div>
