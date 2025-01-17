<?php

function readData($file_name = '', $mode = true){
	return json_decode(file_get_contents($file_name), $mode);
}

function readJsonData($file_name = '', $mode = true){
	return json_decode(file_get_contents(FILES . $file_name . '.json'), $mode);
}

function readCsvData($file_name = ''){
	$row = 0;	
    $out = [];
    if (($handle = fopen($file_name, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);            
            $row++;
            for ($c=0; $c < $num; $c++) {				
                $out[$row][1+$c][0] = $data[$c];
                // echo $data[$c] . "<br />\n";
            }
        }
        fclose($handle);
    }
    return $out;
}

function writeData($file, $data){
	file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
	return "Сохранение, успешно!";
}

function updateData($target = []){
	$file = FILES . $target['target'] . '.json';
	if(!file_exists($file)){
		return;
	}	
	$data = readData($file);
	
	$data[$target['row']][$target['col']][0] = $target['text'];

	echo writeData($file, $data);
	unset($data);
}

function dirScan($dir = FILES){
	$files = scandir($dir);
	unset($files[0], $files[1]);
	return array_values($files);
}

function sortJsonFiles($files = [], $types = 'json'){
	$out = [];
	foreach ($files as $value) {
		$name = explode('.', $value);
		if ($name[1]===$types) {		
			array_push($out, $name[0]);
		}
	}
	sort($out, SORT_NATURAL);
	return $out;
}

function sortDataType($data, ...$sorts){
	$in = $data;
	foreach ($sorts as $sort){
		foreach ($in as $key => $value){
			$find = strpos($value, $sort);
			if($find !== false) {		
				unset($in[$key]);
			}		
		}	
	}	
	return $in;
}

function getId($param) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];	
    } elseif (isset($param)) {
        $id = $param;	
    } else {	
        $id = '5';	
    }
    return $id;
}

function dayArray($schedule){
	$days = [];
	foreach ($schedule as $key => $value) {	
		foreach ($value as $key1 => $value1) {
			array_push($days, $key1);
		}
	}
	return $days;
}

function dayToWeekArray($data){
	$output = [];	
	foreach ($data as $key => $value) {
		array_push($output, $key);
	}	
	return $output;
}

function scanRec($dir = '') {
    $direct = [];
    $path = $dir;
    if (is_dir($path)) {
        $dir_scan = array_slice(scandir($path . '/'), 2);            
        foreach ($dir_scan as $key => $value) {
            $file = $path . '/' . $value;
            if (is_file($file)) {
                // $direct = $value;
                $data = [
                    'name' => $value,
                    // 'type' => mime_content_type($file),
                    // 'size' => round(stat($file)[7]/1024, 2),
                    // 'atime' => date("d F Y H:i:s", stat($file)[8]),
                    // 'mtime' => date("d F Y H:i:s", stat($file)[9])
                ];
                // implode('/', $data);
                array_push($direct, implode('/', $data));
                
            } else {                    
                $direct[$value] = scanRec($dir . '/' . $value);
            }                
        }            
    } else {
        echo 'no dir' . $path;
    }
    ksort($direct, SORT_STRING);
    return $direct;
}