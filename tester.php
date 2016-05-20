<?php
use angelcharly\weather\Weather;
use infrajs\router\Router;
use infrajs\ans\Ans;

if (!is_file('vendor/autoload.php')) {
	chdir('../../../');
	require_once('vendor/autoload.php');
	Router::init();
}

$data = Weather::getData();
$ans = array();
if (7 != sizeof($data)) return Ans::err($ans, 'Некорректные данные о погоде');
if (empty($data['temp'])) return Ans::err($ans, 'Нет данных о температуре');
return Ans::ret($ans);
