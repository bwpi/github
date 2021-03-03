<?php
session_start();
$sessionid = session_id();
/*
* Загрузка модели
*/
include (APP . 'appModel.php');
include (APP . 'appView.php');
include (APP . 'appController.php');


$file = readData(FILES . 'формулы.json', $mode = true);
$data_set = get();
unset($data_set[$controller]);
debug($data_set);

$style = "<link href='/css/core.css' rel='stylesheet'>";
$script_file = "/js/form.js";
$data = compact('sessionid');
$content = getView('_' . $route['controller'], $data);
include VIEWS . "layout/default.php";