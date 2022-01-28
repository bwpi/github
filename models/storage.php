<?php
/**
 * Формирование адреса в адресной строке
 */
function setWebPath($catalog, $show_host = true) {
    if ($show_host) {
        $host = "http://" . $_SERVER['HTTP_HOST'] . "/" . CURRENT_CONTROLLER . '/';
    }    
	return $host . $catalog;
}
function setPath($path, $work_catalog, $web = '') {    
	foreach ($path as $key => $value) {
		if (is_dir($work_catalog . $key)) {			
			$catalog = $web . $key . '/';
			$style = 'directory';			
			echo '<a class="'. $style .'" href="?dir=' . $catalog . '"><img src="/img/folder.svg"/>' . setWebPath($catalog, false) . '</a>';            
			$dir = $work_catalog . $key . '/';
   //          //echo $dir . '<br>';
			// Отправляем на рекурсию внутрь каталога 
			// setPath($path[$key], $dir, $catalog);
		} else {
            $catalog = $web . $value;
            $file_exec = explode('.', $value)[1];
            $style = 'green files';
			echo '<a class="'. $style .'" href="' . setWebPath($catalog) . '"><img src="/img/'.$file_exec.'.svg"/>' . setWebPath($catalog, false) . '</a>';            
			//echo $work_catalog . $value . '<br>';
		}		
	}    
}
function setPathInTo($path, $work_catalog, $dir = '') { 	
	foreach ($path as $key => $value) {		
		if (is_dir($work_catalog . $value)) {			
			$catalog = $value . '/';
			$style = 'directory';			
			echo '<a class="'. $style .'" href="?dir='. $dir . $catalog . '"><img src="/img/folder.svg"/>' . setWebPath($value, false) . '</a>';			
		} else {
            $catalog = $dir . $value;
            $file_exec = explode('.', $value)[1];
            $style = 'green files';
			echo '<a class="'. $style .'" href="'. setWebPath($catalog) . '"><img src="/img/'.$file_exec.'.svg"/>' . setWebPath($value, false) . '</a>';			
		}
	}
}