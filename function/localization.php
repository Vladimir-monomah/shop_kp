<?php

function localize_text($source_text, $destination_locale, $link)
{
    $default_lang = 'ru';

	$id = md5($source_text);
	if(!$link)
	{
	    die("Нет соединения");
	}

	$localization_result = mysql_query("SELECT * FROM localization WHERE id = '$id'", $link) or die("Ошибка 1: ".mysql_error());
	$locale_text_row = mysql_fetch_array($localization_result);
	
	if(!$locale_text_row)
	{
		// Такой строки ещё не существует в БД, добавляем
		mysql_query("INSERT INTO localization (id, ".$default_lang.") VALUES('".$id."', '".$source_text."')", $link) or die("Ошибка 2: ".mysql_error());

		// Т.к. перевод ещё не был сделан, то вернём исходную строку
		return $source_text;
	}
	
	$translated_text = $locale_text_row[$destination_locale];
	return (isset($translated_text) and !!$translated_text)
		? $translated_text
		: $source_text;
}
?>