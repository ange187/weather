<?php
require_once('weather/Weather.php');

$html = angelcharly\weather\Weather::getHtml();

echo $html;
//сделать функцию которая возвращает html и полностью заменяет код в index.php