<?php
/*
*Переменные
*/
$title = 'Расписание';
$author = 'Гусельников';
$Email = 'guselnickov.yura@yandex.ru';
$Vk = 'num08';
// $color = '4A76A8';
// if (isset($_GET['color'])) { $color = $_GET['color'];}
$color = getColor($route['color']??372);
$colors = [
	'625',
	'4A76A8',
	'970600',
	'cd6939',
	'202020',
	'76A900',
	'000055',
	'000'
];

function getColors($array=[]){
	$out = '';
	foreach ($array as $key => $value) {
		$href = colorBox($value);		
		$out .= "<a href='{$href}' class='aBestColor'><div class='bestColor' style='background-color: #{$value}'></div></a>";
	}
	return $out;
}

$colorButtonTemplate = getColors($colors);
$menuTemplate = getMenuTemplate($out, compact('id', 'color'));?>
