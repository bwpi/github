<?php
session_start();
$sessionid = session_id();
/*
* Загрузка модели
*/
include (APP . 'appModel.php');
include (APP . 'appView.php');
// include (APP . 'appController.php');


// $file = readData(FILES . 'формулы.json', $mode = true);
// debug(get());
// if(get()){
//     debug($file[$_GET['class']][$_GET['quad']]);
// }
$style = "<link href='/css/core.css' rel='stylesheet'>";
$data = compact('sessionid');
$content = getView('_' . $route['controller'], $data);
include VIEWS . "layout/default.php";