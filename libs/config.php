<?php
/*
* Константа, которая содержит путь до корневого (главного) каталога нашего сайта
*/
//Отображение данных в темплейтах
define('ALLOW_ARRAY_DATA', 0);
define('ALLOW_ERROR', 0);
/*
*Включение ошибок
*/
if(ALLOW_ERROR) {
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
}

/*
*
*/
define('ROOT', dirname(dirname(__FILE__)));
define('CORE', ROOT . '/core/');
/*
* Константа, которая содержит путь до каталога с файлами
*/
define('APP', ROOT . '/app/');
define('FILES', ROOT . '/files/');
define('LIBS', ROOT . '/libs/');
define('CTRLS', ROOT . '/controllers/');
define('MODELS', ROOT . '/models/');
define('VIEWS', ROOT . '/views/');
define('SERVER', $_SERVER['HTTP_HOST']);