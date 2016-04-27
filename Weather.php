<?php
namespace angelcharly\weather;
use infrajs\config\Config;
use infrajs\template\Template;
Class Weather {
	public static function getHtml()
	{
		$conf = Config::get('weather');
		$id =  $conf['city_id'];
		$forecast = Weather::getData($id);
		$src = 'weather/weather.html';
		$html = Template::parse($src, $forecast);
		return $html;
	}

	public static function getData($city_id) 
	{
		$data_file = 'http://export.yandex.ru/weather-ng/forecasts/'.$city_id.'.xml'; // адрес xml файла 
		$count = 0;

		$conf = Config::get('weather');  
		$stop_count = $conf['count'];
		
		do {
			$xml = @simplexml_load_file($data_file);
			$count = $count + 1;
			if ($count > $stop_count){
				echo 'попробуй еще раз. Было попыток:'.$count;
				return;
			}

		} while ($xml === false);

		
		$attr = $xml->attributes();
		$city = (string) $attr['city'];

		$temp = (int) $xml->fact->temperature;
		$pic = (string) $xml->fact->image;
		$type = (string) $xml->fact->weather_type;


		if ($temp > 0) {// Если значение температуры положительно, для наглядности добавляем "+"
			$temp = '+'.$temp;
		}

		$data = array(
			'city' => $city ,// город
			'pic' => $pic, // картинка
			'temp' => $temp, // температура
			'type' => $type, 
		);
		return $data;
	}
}