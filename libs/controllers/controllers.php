<?php
/*
* Главный контроллер
*/
function getColor($param) {
    if (isset($_GET['color'])) {
        return $_GET['color'];
    } 
    if (isset($param)) {
        return $param;	
    }
    return '000';
}