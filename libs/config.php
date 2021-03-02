<?php
/*
* Константа, которая содержит путь до корневого (главного) каталога нашего сайта
*/
define('ROOT', dirname(dirname(__FILE__)));
/*
* Константа, которая содержит путь до каталога с файлами
*/
define('APP', ROOT . '/app/');
define('FILES', ROOT . '/files/');
define('LIBS', ROOT . '/libs/');
define('CTRLS', ROOT . '/controllers/');
define('MODELS', ROOT . '/models/');
define('VIEWS', ROOT . '/views/');
define('SERVER', $_SERVER['HTTP_ADDRESS']);