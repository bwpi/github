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
// debug(get());
// if(get('class')){
//     foreach(explode(',' ,get('class')) as $value){
//         debug($file[$value]);
//     }    
// } else {
//     echo 'no';
// }
$style = "<link href='/css/core.css' rel='stylesheet'>";
$script_file = '/js/form.js';
$data = compact('sessionid');
$content = getView('_' . $route['controller'], $data);
include VIEWS . "layout/default.php";