<?php
/**
 * библиотека функций
 */
include ("libs/functions.php");

define('HTTP_HOST', "http://".$_SERVER['HTTP_HOST']."/");
define('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);
/**
 * Базовый каталоги
 */
define('ROOT', dirname(dirname(__FILE__))); /* Корневой каталог */
define('APP', ROOT . '/app/'); /* Кааталог приложения */
define('WWW', ROOT . '/public/'); /* Публичный каталог */
define('STORAGE', ROOT . '/storage/d1/'); /* Каталог хранения данных */
/**
* Шаблон по умолчанию
*/
define('LAYOUT', 'default');
/**
 * Каталоги в Vendor
 */
define('CORE', dirname(__FILE__) . '/core/');
define('LIBS', dirname(__FILE__) . '/libs/');
define('DATA', dirname(__FILE__) . '/data/');
/**
 * Каталоги в App
 */
define('VIEWS', (APP . 'views/'));
define('MODELS', (APP . 'models/'));
define('CONTROLLERS', (APP . 'controllers/'));
/**
 * Каталоги в Public
 */
define('IMG', HTTP_HOST . 'img/');