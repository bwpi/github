<?php
/*
*Переменные
*/
$title = 'Расписание';
$author='Гузельников';
$color = '4A76A8';
$out_array = [];
$day_array = [];
/*
*Ядро нашей программы
*/
$files = dirScan();
$out = sortJsonFiles($files);

if (isset($_GET['id'])) {
	$id = FILES . $_GET['id'];
} else {
	$_GET['id'] = '5';
	$id = FILES . $_GET['id'];
}

$schedule = readData($id . '.json');

foreach ($schedule as $key => $value) {	
	foreach ($value as $key1 => $value1) {
		array_push($day_array, $key1);
	}
}

// if (isset($_GET['save_schedule'])) {
// 	$fp = fopen(FILES . $_GET['id'] . '.csv', 'w');
// 	foreach ($schedule as $key => $value) {
// 		foreach ($value as $key1 => $value1) {
// 			for ($i=1; $i < 7; $i++) { 
// 				$fp .= $i . ',' . $schedule[$key][$key1][$i][0] . ',' . PHP_EOL;
// 			}			
// 		}
// 	}
// 	debug($fp);
// 	fclose($fp);
// }
/*
*Подключение шаблона
*/
include "temp.php";
?>