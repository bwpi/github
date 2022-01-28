<?php
/*
* Загрузка модели
*/
include (MODELS . 'model.php');
include (LIBS . 'controllers/controllers.php');
include (LIBS . 'views/table.php');
include (LIBS . 'views/viewFunction.php');
include (LIBS . 'Auth.php');
// include (MODELS . 'model_csv.php');
$out_array = [];
$shedule_head = $controller . "/" . $view . '_head';
$shedule_view = $controller . "/" . $view;

/*
*Ядро нашей программы
*/
$files = dirScan();
$out = sortJsonFiles(sortDataType($files, 'likes','editable','cop', 'формулы', 'develop', 'hb'));
$id = getId($param);
$schedule = readData(FILES . $id . '.json');
$day_week = dayToWeekArray($schedule);
// debug($files);
// debug($out);
/******
 * 
 */
$out_csv = sortJsonFiles(sortDataType($files, 'копия', 'b2'), 'csv');
$out_array_csv = readCsvData(FILES . $out_csv[0] . '.csv');
// debug($out_array_csv);
/*
* Подключение персонального контроллера
*/
include CTRLS . $controller . '/' . $view . '.php';
if(isAjax()){    
    if(!empty($_POST["update"])){
        updateData($_POST["update"]);        
    } else {
        echo 'нет настроек, не знаем куда писать.';
    }            
    die;
}
/*
*Подключение шаблона
*/
include VIEWS . $controller . ".php";