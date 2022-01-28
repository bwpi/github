<?php
session_start();

/*
* Загрузка файла конфигурации
*/
include ('../libs/config.php');
/**
 * Включение системного дебугера
 */
include (CORE . 'debugger/Debugger.php');
/*
* Загрузка файла фукнций
*/
include (LIBS . 'Router.php');
//include (LIBS . 'Auth.php');

/*
* Реализация автозагрузки контроллера, модели и вида
*/
$route = Router(request());

/*
* Правила маршрутизации
*/
$route = dispatcher('shedules', 'расписание', $route);
$route = dispatcher('календарь', 'calendar', $route);

// $route = dispatcher('здрасте', 'расписание', $route);
$route = dispatcher('формулы', 'formulas', $route);
$route = dispatcher('календарь/чапайкин', 'calendar/08', $route);
$route = dispatcher('календарь/табаков', 'calendar/09', $route);
$route = dispatcher('календарь/зырянов', 'calendar/10', $route);
$route = dispatcher('календарь/учитель', 'calendar/main', $route);

$route = dispatcher('shedules/гусельников', 'расписание/08', $route);
$route = dispatcher('shedules/алексеев', 'расписание/09', $route);
$route = dispatcher('shedules/кайдаулов', 'расписание/10', $route);
$route = dispatcher('shedules/учитель', 'расписание/main', $route);
$route = dispatcher('shedules/08/', 'расписание/08/{param}/{color}', $route);

// $route = dispatcher('shedules', 'расписание/10/<param>/<parametr>', $route);
$route = dispatcher('07', 'contests', $route);
/*
* Запуск приложения
*/
Render($route);
/**
 * Debugger show
 */
Debug::show();
