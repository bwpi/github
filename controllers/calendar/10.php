<?php
$style_file = '/css/calendar10.css';
$script_file = '/js/calendar10.js';
$prevWeek = strtotime(date('2021-08-28'));	
$nextWeek = strtotime(date('2022-06-01'));	
$var=readJsonData('develop');
$var1=readJsonData('hb');
$var2=readJsonData('hd'); 

rewritableDataGet();
$content = "<div class='calendar'>
	<div style='border: 10px solid red; padding: 15px'>Текущая дата - " . date("Y-m-d") . "-09</div>
	<div style='border: 10px solid red; padding: 15px'>Временная метка - " . time() . "</div>
	<div style='border: 10px solid red; padding: 15px'>Всего дней в периоде - " . ($nextWeek-$prevWeek)/(24*60*60) . "</div> 		
	<div class='days'>"; 		
/*главный цикл*/
		for ($i=0; $i < ($nextWeek-$prevWeek)/(24*60*60); $i++) {
			$day = date('Y-m-d', ($prevWeek)+($i*24*60*60));
			if($day == $_GET['add']) {
				$edit = "<form method='GET'>
					<input type='text' name='text'/>
					<input type='hidden' name='day' value='{$_GET['add']}'/>
					<input type='hidden' name='type' value='{$_GET['type']}'/>
					<input type='submit' name='submit'/>
				</form>";
			} else {
				$edit = "<a class='add' href='?add={$day}&type=hb'>добавить</a>";
			}
			$array_bd = birthDay($day, 'hb');
			$array_develop = developDay($day, 'develop');
			$array_hd = happyDay($day, 'hd');			
			$class_list = currentDay($day);
			$class_list .= $array_bd['class'];	
			$content .= "<div class='" . $class_list . "'>" . $day . $edit . $array_bd['block'] . $array_develop['block'] . $array_hd['block'] . "</div>";
		}
$content .= "</div></div>";