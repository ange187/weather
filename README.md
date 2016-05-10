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
		"city_id":36079,
		"count":6
	}
}
```
Код города citi_id можно посмотреть [тут](https://pogoda.yandex.ru/static/cities.xml)
## Требование
Требуется php от 5.4. Требуется composer, с подключенным **vendor/autoload.php**
