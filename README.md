# Погода

## Demo
[Пример как выглядит](http://white-phoenix.tk/programming.php)

## Установка
Установка через composer.
```json
{
  "require": {
    "angelcharly/weather": "~1"
  }
}
```

## Использование
```php
  $html = \angelcharly\weather\Weather::getHtml();
  echo $html;
```
Необходимо создать в корне вашего сайта фаил .infra.json
```json
{
	"weather":{
		"city":"Tolyatti",
		"key": "там",
	}
}
```
На сайте [openweathermap.org](http://openweathermap.org/) можно посмотреть city и key.

## Требование
Требуется php от 5.4. Требуется composer, с подключенным **vendor/autoload.php**

## Тестирование
Откройте в браузере /vendor/angelcharly/weather/tester.php

