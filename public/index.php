<?php
/*
*Включение ошибок
*/
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

/*
* Загрузка файла конфигурации
*/
include ('../libs/config.php');
/*
* Загрузка файла фукнций
*/
include (LIBS . 'functions.php');
/*
* Реализация автозагрузки контроллера, модели и вида
*/
$route = Router(request());
/*
* Правила маршрутизации
*/
$route = dispatcher('shedules', 'расписание', $route);
$route = dispatcher('формулы', 'formulas', $route);
$route = dispatcher('shedules/гусельников', 'расписание/08', $route);
$route = dispatcher('shedules/алексеев', 'расписание/09', $route);
$route = dispatcher('shedules/кайдаулов', 'расписание/10', $route);
$route = dispatcher('shedules/учитель', 'расписание/main', $route);
// $route = dispatcher('shedules', 'расписание/10/<param>/<parametr>', $route);
$route = dispatcher('07', 'contests', $route);
/*
* Запуск приложения
*/
Render($route);