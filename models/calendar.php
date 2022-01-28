<?php
function rewritableDataGet() {
  	if (isset($_GET['text'])&&isset($_GET['day'])&&isset($_GET['type'])) {
		$arr = json_decode(file_get_contents(ROOT . '/files/' . $_GET['type'] . '.json'),true);
		if (array_key_exists($_GET['day'], $arr)) {
			if(!is_array($arr[$_GET['day']])) {
				$w = $arr[$_GET['day']];
				$arr[$_GET['day']] = [];
				array_push($arr[$_GET['day']], $w);
			}		
			array_push($arr[$_GET['day']], $_GET['text']);		
		} else {
			$arr[$_GET['day']]= $_GET['text'];
		}	
		$o = json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		file_put_contents(ROOT . '/files/' . $_GET['type'] . '.json', $o);
	}
}  
function rewritableData() {
	if (!empty($_POST['text'])&&isset($_POST['text'])&&isset($_POST['day'])&&isset($_POST['type'])) {
		$arr = json_decode(file_get_contents(ROOT . '/files/' . $_POST['type'] . '.json'),true);
		
		if (array_key_exists($_POST['day'], $arr)) {
			if(!is_array($arr[$_POST['day']])) {
				$w = $arr[$_POST['day']];
				$arr[$_POST['day']] = [];
				array_push($arr[$_POST['day']], $w);
			}		
			array_push($arr[$_POST['day']], $_POST['text']);		
		} else {
			$arr[$_POST['day']]= $_POST['text'];
		}	
		$o = json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);	
		file_put_contents(ROOT . '/files/' . $_POST['type'] . '.json', $o);	
	}
}
function formMethod() {
	if (isset($_GET['add'])&&isset($_GET['type'])) {
		$edit = "<form method='POST'>
					<div class='input-group mb-3'>
					  <input type='text' name='text' class='form-control' placeholder='Recipient's username' aria-label='Recipient's username' aria-describedby='button-addon2'>
					  <button class='btn btn-secondary' type='submit' id='button-addon2' name='submit'>Добавить событие</button>
					</div>
					<input type='hidden' name='day' value='{$_GET['add']}'/>
					<input type='hidden' name='type' value='{$_GET['type']}'/>
					<a class='btn btn-danger close btn-close' aria-label='Close'></a>
				</form>";
		echo $edit;
		exit;
	}
}
function userFunc($array, $item) {
	if (array_key_exists($item, $array)) {
		return $array[$item];
	}
}
function formAdd() {
	if (isset($_GET['add'])&&isset($_GET['type'])) {
		$edit = "<form method='POST'>
					<div class='input-group mb-3'>
					  <input type='text' name='text' class='form-control' placeholder='Recipient's username' aria-label='Recipient's username' aria-describedby='button-addon2'>
					  <button class='btn btn-secondary' type='submit' id='button-addon2' name='submit'>Добавить событие</button>
					</div>
					<input type='hidden' name='day' value='{$_GET['add']}'/>
					<input type='hidden' name='type' value='{$_GET['type']}'/>
					<a class='btn btn-danger close btn-close' aria-label='Close'></a>
				</form>";
		echo $edit;
		exit;
	}
}
function currentDay($day) {
	$num = date("w", strtotime($day));
	if ($day == date("Y-m-d")) {
		$out = 'current_day'; 
	} elseif($num == 0 || $num == 6) {
		$out = 'weekend';
	} else {
		$out = 'day';
	}
	return $out;
}
function birthDay($day, $file_name) {
	$out = [];
	$data = json_decode(file_get_contents(ROOT . '/files/' . $file_name . '.json'),true);
	if (array_key_exists($day, $data)) {
		$out['class'] = ' hb';				
	}
	if (is_array($data[$day])) {
		foreach ($data[$day] as $value) {
			$out['block'] .= '<div class="bd">' . $value . '</div>';
		}
	}
	if (isset($data[$day])&&!is_array($data[$day])) {
		$out['block'] = '<div class="bd">' . $data[$day] . '</div>';
	}
	return $out;
}
function developDay($day, $file_name) {
	$out = [];
	$data = json_decode(file_get_contents(ROOT . '/files/' . $file_name . '.json'),true);
	if (array_key_exists($day, $data)) {
		$out['class'] = ' develop';				
	}
	if (is_array($data[$day])) {
		foreach ($data[$day] as $value) {
			$out['block'] .= '<div class="develop">' . $value . '</div>';
		}
	}
	if (isset($data[$day])&&!is_array($data[$day])) {
		$out['block'] = '<div class="develop">' . $data[$day] . '</div>';
	}
	return $out;
}

