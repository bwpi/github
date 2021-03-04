<?php
session_start();
$sessionid = session_id();
$style = "<link href='/css/core.css' rel='stylesheet'>";
$script_file = "/js/form.js";
/*
* Загрузка модели
*/
include (APP . 'appModel.php');
include (APP . 'appView.php');
include (APP . 'appController.php');


$file = readData(FILES . 'формулы.json', $mode = true);
if (!get('gen')) {
    $data = compact('sessionid');
    $content = getView('/formulas/' . '_' . $route['controller'], $data);
} else {    
    $selection = $file[get('class')][get('quart')];
    $selected = [];
    $data = [];
    foreach($selection as $key => $value){
        if (count($value)>1) {
            foreach ($value as $k => $val) {                
                array_push($selected, $value[$k]);
            }
        } else {
            array_push($selected, $value[1]);
        }
    }
    foreach($selected as $value) {
        foreach($value as $key => $out) {
            $data[$key] = $out;
        }        
    }
    // debug($data);
    $content = getView('/formulas/' . $route['controller'], $data);
}

include VIEWS . "layout/default.php";