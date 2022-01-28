
<?php
$style_file = '/css/calendar.css';
$script_file = '/js/users.js';
$var = readJsonData('develop');
$var1 = readJsonData('hb');
$var2 = readJsonData('hd');
$prevWeek = strtotime(date('2021-08-30'));	
$nextWeek = strtotime(date('2022-06-01'));
$day_curent = date("Y-m-d");

formAdd();

$content = "<h1 class='text-center'>Календарь</h1>	
		<div style='border: 10px solid red; padding: 15px'>" . date('Y-m-d') . "-08</div>
		<div style='border: 10px solid red; padding: 15px'>" . time() . "</div>
		<div style='border: 10px solid red; padding: 15px'>" . ($nextWeek-$prevWeek)/(24*60*60) . "</div>";		
		

		for ($i=0; $i < ($nextWeek-$prevWeek)/(24*60*60); $i++) {
			$out = '';
			$day = date('Y-m-d', ($prevWeek)+($i*24*60*60));
			//Дни рождения
			$happy_birthday = userFunc($var1, $day);
			if($day == $day_curent) {
				$curent = 'id="current"';
			} else {
				$curent = 'id="day"';
			}
			if ($happy_birthday) {
				$out .= '<div class="card"><h4>Именинники <span class="badge bg-info">' . count($happy_birthday) . '</span></h4><div class="card-container">';
				if (is_array($happy_birthday)) {
					foreach ($happy_birthday as $value) {
						$out .= '<div class="alert alert-success">' . $value . '</div>';
					}
				} else {
					$out .= '<div class="alert alert-success">' . $happy_birthday . '</div>';
				}
				$out .= '</div></div>';
			}
			//Мероприятия
			$development = userFunc($var, $day);			
			if ($development) {
				$out .= '<div class="card card-danger"><h4>Мероприятия <span class="badge bg-info">' . count($development) . '</span></h4><div class="card-container">';
				if (is_array($development)) {
					foreach ($development as $value) {
						$out .= '<div class="alert alert-success">' . $value . '</div>';
					}
				} else {
					$out .= '<div class="alert alert-success">' . $development . '</div>';
				}
				$out .= '</div></div>';
			}			
			//Праздники
			$hollyday = userFunc($var2, $day);			
			if ($hollyday) {
				$out .= '<div class="card card-danger"><h4>Праздники <span class="badge bg-info">' . count($hollyday) . '</span></h4><div class="card-container">';
				if (is_array($hollyday)) {
					foreach ($hollyday as $value) {
						$out .= '<div class="alert alert-success">' . $value . '</div>';
					}
				} else {
					$out .= '<div class="alert alert-success">' . $hollyday . '</div>';
				}
				$out .= '</div></div>';
			}			
			$content .= '<div style="border: 5px solid yellow; padding: 5px; margin: 5px" ' . $curent . '>' . $day . $out . '</div>';				
		}

?>