<?php
/*
* Загрузка модели
*/
include (MODELS . 'model.php');
/*
*Переменные
*/

/*
*Подключение шаблона
*/
ob_start();
if(is_file(VIEWS . $controller . '.html')){
	require VIEWS . $controller . '.html';
} else {
	echo "<p>не найден вид <b>" . VIEWS . $controller . ".html</b></p>";
}
$content = ob_get_clean();
include VIEWS . "layout/default.html";