<?php
$style_file = '/css/calendar08.css';
$script_file = '/js/calendar08.js';
$prevWeek = strtotime(date('2021-09-01'));	
$nextWeek = strtotime(date('2022-05-31'));	
$var = readJsonData('develop');
$var1 = readJsonData('hb');
$var2 = readJsonData('hd');

formMethod();

rewritableData();

$content = "<div class='calendar'>    
	<div class='header'>" . date("Y-m-d") . "-09</div>
	<div class='header'>" . time() . "</div>
	<div class='header'>" . ($nextWeek-$prevWeek)/(24*60*60) . "</div>";	 		
	/*главный цикл*/
	for ($i=0; $i < ($nextWeek-$prevWeek)/(24*60*60); $i++) {
		$day = date('Y-m-d', ($prevWeek)+($i*24*60*60));				
		$edit = "<a class='add' href='?add={$day}&type=hb'>добавить</a>";				
		$array_bd = birthDay($day, 'hb');
		$class_list = currentDay($day);
		$class_list .= $array_bd['class'];
		$content .= "<div class='" . $class_list . "'>" . $day . $edit . $array_bd['block'] . "</div>";
	}		
$content .= "</div>";   