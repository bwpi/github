<?php
session_start();
$sessionid = session_id();
/*
* Загрузка модели
*/
include (MODELS . 'model.php');
include (APP . 'appView.php');
include (APP . 'appController.php');


$file = readData(FILES . 'формулы.json', $mode = true);
debug(get());
if(get('submit')){
    debug($file[$_GET['class']][$_GET['quad']]);
}

$data = compact('sessionid');
$content = getView($route, $data);
include VIEWS . "layout/default.php";