<?php
/**
 * Функции
 */
//Вывод массивов
function debug($arr) {
    if (is_string($arr)) {
        echo '<div style="position: relative; overflow: auto; border-radius: 10px; top: 0; left: 0; width:30%; display:block; margin:10px; padding: 10px; background-color: rgba(200,200,250,.9); z-index: 1500">';
        echo '<h4>TEXT</h4>';
        echo '<div style="padding: 10px; background-color: rgba(250,250,250,.9)">';
        echo '<code><b>' . $arr . '</b></code>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div style="position: relative; overflow: auto; border-radius: 10px; top: 0; left: 0; max-height:80%; float:right; margin:30px; padding: 20px; background-color: rgba(100,100,250,.9); z-index: 1500">';
        echo '<h4>ARRAY</h4>';
        echo '<div style="padding: 10px; background-color: rgba(250,250,250,.9)">';
        echo '<pre>' . print_r($arr, true) . '</pre>';
        echo '</div>';
        echo '</div>';
    }
}
/*
* Заглавные буквы в Кирилице
*/
function my_ucfirst($string, $e ='utf-8') {
        if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) {
            $string = mb_strtolower($string, $e);
            $upper = mb_strtoupper($string, $e);
            preg_match('#(.)#us', $upper, $matches);
            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e);
        } else {
            $string = ucfirst($string);
        }
        return $string;
    }

function redirect($url = 'login'){
    header("Location: /$url");    
}