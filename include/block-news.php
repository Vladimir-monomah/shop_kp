<?php
	defined('it') or die('Доступ запрещён!');

    include('db_connect.php');

	// Проверка соединения
	if (!$link) {
		die("Ошибка соединения: " . mysqli_connect_error());
	}

	// Функция для выполнения SQL-запроса
	function query($link, $sql) {
		return mysqli_query($link, $sql);
	}

	// Функция для получения результата запроса в виде массива
	function fetch_array($result) {
		return mysqli_fetch_array($result);
	}

	// Функция для получения количества строк результата запроса
	function num_rows($result) {
		return mysqli_num_rows($result);
	}

	// Функция для закрытия соединения с базой данных
	function close($link) {
		mysqli_close($link);
	}

	// Функция для получения локализованного текста
	function localize_text($text, $lang, $link) {
		// Ваш код для получения локализованного текста
	}

	// Запросы к базе данных

	// Новости
	$result = query($link, "SELECT * FROM news ORDER BY id DESC");
	if (num_rows($result) > 0) {
		while ($row = fetch_array($result)) {
			echo '
			<li style="">
				<span>' . $row["date"] . '</span>
				<a href="">' . localize_text($row["title"], $_SESSION["lang"], $link) . '</a>
				<p>' . localize_text($row["text"], $_SESSION["lang"], $link) . '</p>
			</li>';
		}
	}

	// Закрытие соединения с базой данных
	close($link);
?>
