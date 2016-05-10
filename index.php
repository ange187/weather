<?php

if (!is_file('vendor/autoload.php')) {
	chdir('../../../');
	require_once('vendor/autoload.php');
}

$html = angelcharly\weather\Weather::getHtml();

echo $html;
//сделать функцию которая возвращает html и полностью заменяет код в index.php