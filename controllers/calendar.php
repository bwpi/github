<?php
/*
* Загрузка модели
*/
include (MODELS . "model.php");
include (MODELS . "$controller.php");
/*
* Подключение персонального контроллера
*/
if(is_file(CTRLS . $controller . '/' . $view . '.php')) {
    include CTRLS . $controller . '/' . $view . '.php';
} else {
    include CTRLS . $controller . '/main.php';
}

/*
*Подключение шаблона
*/
include VIEWS . $controller . ".php";
