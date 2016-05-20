<?php
use angelcharly\weather\Weather;
use infrajs\router\Router;

if (!is_file('vendor/autoload.php')) {
	chdir('../../../');
	require_once('vendor/autoload.php');
	Router::init();
}

$data = Weather::getHtml();

print_r ($data);