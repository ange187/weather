<?php
namespace angelcharly\weather;
use infrajs\template\Template;
use infrajs\path\Path;
use infrajs\cache\Cache;

Class Weather {
	public static $conf = array(

		'city' => 'Tolyatti',
		'key' => 'e499ab92799911d89b02ac1460f606a9',
		'lang' => array(
			'few clouds' => 'Местами облачно',
			'scattered clouds' => 'Рассеянные облака',
			'Tolyatti' => 'Тольятти'
		)
	);
	public static function load($src)
	{
		$mark = date("d F Y h");

		$data = Cache::exec(array(), __FILE__, function ($src) {
			$data = file_get_contents($src.'&units=metric&appid='.Weather::$conf['key']);
			$data = json_decode($data, true);
			return $data;
		}, array($src, $mark), isset($_GET['re']));
		return $data;
	}

	public static function lang($str)
	{
		if (isset(Weather::$conf['lang'][$str])) return Weather::$conf['lang'][$str];
		return $str;
	}
	public static function getData()
	{
		$src = 'http://api.openweathermap.org/data/2.5/weather?q='.Weather::$conf['city'];
		$data = Weather::load($src);
		$forecast = array(
			'city' => Weather::lang($data['name']),
			'icon' => 'http://openweathermap.org/img/w/'.$data['weather'][0]['icon'].'.png',
			'descr' => Weather::lang($data['weather'][0]['description']),
			'temp' => $data['main']['temp'].' °C',
			'clouds' => $data['clouds']['all'].'%',	
			'wind' => $data['wind']['speed'].' м/с',
			'id' => $data['id']
		);
		//echo '<pre>';
		//print_r($data);
		//exit;
		return $forecast;
	}

	public static function getHtml()
	{
		$forecast = Weather::getData();
		$src = '-weather/weather.html';
		if (!Path::theme($src)) throw new \Exception('Не найден шаблон '.$src);
		$html = Template::parse($src, $forecast);
		return $html;
	}

	
}