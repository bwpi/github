<?php
$style_file = '/css/calendar09.css';
$script_file = '/js/calendar09.js';
// $storage_views = 'calendar/09';

$prevWeek = strtotime(date('2021-08-30'));	
$nextWeek = strtotime(date('2022-06-01'));

$var = json_decode(file_get_contents(ROOT . '/files/develop.json'),true);
$var1 = json_decode(file_get_contents(ROOT . '/files/hb.json'),true);

formMethod();

rewritableData();

$content = "<h1 class='text-center'>Календарь</h1>
<div class='calendar'><a href='#' id='vid'>vid</a>
<div class='header'>" . date("Y-m-d") . "-09</div>
<div class='header'>" . time() . "</div>
<div class='header'>" . ($nextWeek-$prevWeek)/(24*60*60) . "</div>
<div class='tabakov'>";
	
	/*главный цикл*/
	for ($i=0; $i < ($nextWeek-$prevWeek)/(24*60*60); $i++) {

		$day = date('Y-m-d', ($prevWeek)+($i*24*60*60));
		
		$edit = "<a class='add' href='?add={$day}&type=hb'>добавить</a>";
		
		$array_bd = birthDay($day, 'hb');
		$array_develop = developDay($day, 'develop');
		$class_list = currentDay($day);
		$class_list .= $array_bd['class'];					
		$content .= "<div class='" . $class_list . "' id='".currentDay($day)."'>" . $day . $edit . $array_bd['block'] . $array_develop['block'] ."</div>";
	}
$content .= "</div></div>";
?>