<?php
/*
* Загрузка модели
*/
include (MODELS . "$controller.php");
include (MODELS . "model.php");
// include (LIBS . "Auth.php");
include (LIBS . "Fs.php");
include (LIBS . "views/Templates.php");
/*
* Подключение персонального контроллера
$head
$storage_views || $content
$script_file
$scripts
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