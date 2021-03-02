<?php

include CTRLS . $controller . '/' . $view . '.php';

// include VIEWS . $controller . '/' . $view . '.php';

if(is_file(VIEWS . $controller . '/' . $view . '.html')){
	ob_start();
		include VIEWS . $controller . '/' . $view . '.html';
	$content = ob_get_clean();
	$style = `<link rel="stylesheet" href="../css/core.css">`;
	include VIEWS . "layout/default.html";
} else {
	include VIEWS . "layout/404.html</b></p>";
}

